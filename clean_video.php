<?php
/**
 * CleanAI 4U - Video Metadata Purger (FFmpeg Engine)
 * Expurga metadados C2PA, EXIF, QuickTime/MP4 tags sem perda de qualidade.
 */
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

ini_set('upload_max_filesize', '150M');
ini_set('post_max_size', '160M');
ini_set('memory_limit', '256M');
ini_set('max_execution_time', 180);

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_FILES['video'])) {
    http_response_code(400);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['success' => false, 'error' => 'Nenhum vídeo foi enviado.']);
    exit;
}

$file = $_FILES['video'];
if ($file['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['success' => false, 'error' => 'Erro no upload do vídeo (código: ' . $file['error'] . ').']);
    exit;
}

// Detect ffmpeg binary
$ffmpeg = 'ffmpeg';
$candidates = ['/usr/bin/ffmpeg', '/usr/local/bin/ffmpeg', '/home/fabiano/.local/bin/ffmpeg'];
foreach ($candidates as $c) {
    if (@file_exists($c) && @is_executable($c)) {
        $ffmpeg = $c;
        break;
    }
}

$tmpDir = sys_get_temp_dir() . '/cleanai_' . uniqid();
if (!@mkdir($tmpDir, 0777, true)) {
    $tmpDir = '/tmp/cleanai_' . uniqid();
    @mkdir($tmpDir, 0777, true);
}

$origName = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $file['name']);
$inputPath = $tmpDir . '/in_' . $origName;
$outputPath = $tmpDir . '/clean_' . $origName;

if (!move_uploaded_file($file['tmp_name'], $inputPath)) {
    http_response_code(500);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['success' => false, 'error' => 'Falha ao salvar arquivo temporário.']);
    @rmdir($tmpDir);
    exit;
}

$opticalBypass = isset($_POST['opticalBypass']) && $_POST['opticalBypass'] === 'true';

if ($opticalBypass) {
    // Subtle optical re-encode: 1% crop + reset metadata to defeat AI vision detectors
    $cmd = escapeshellcmd($ffmpeg) . " -y -i " . escapeshellarg($inputPath) . " -map_metadata -1 -vf \"crop=in_w*0.99:in_h*0.99\" -c:v libx264 -preset fast -crf 19 -c:a aac " . escapeshellarg($outputPath) . " 2>&1";
} else {
    // Pure metadata purge: 0% quality loss, instant remux
    $cmd = escapeshellcmd($ffmpeg) . " -y -i " . escapeshellarg($inputPath) . " -map_metadata -1 -c copy " . escapeshellarg($outputPath) . " 2>&1";
}

exec($cmd, $output, $returnCode);

if ($returnCode !== 0 || !file_exists($outputPath) || filesize($outputPath) === 0) {
    // If optical bypass failed or ffmpeg copy had issue, fallback to basic copy
    $cmdFallback = escapeshellcmd($ffmpeg) . " -y -i " . escapeshellarg($inputPath) . " -map_metadata -1 -c copy " . escapeshellarg($outputPath) . " 2>&1";
    exec($cmdFallback, $output2, $returnCode2);
}

if (!file_exists($outputPath) || filesize($outputPath) === 0) {
    @unlink($inputPath);
    @unlink($outputPath);
    @rmdir($tmpDir);
    http_response_code(500);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['success' => false, 'error' => 'Falha no processamento com FFmpeg.']);
    exit;
}

// Deliver cleaned video
header('Content-Description: File Transfer');
header('Content-Type: video/mp4');
header('Content-Disposition: attachment; filename="cleanai_' . $origName . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($outputPath));
readfile($outputPath);

// Clean up
@unlink($inputPath);
@unlink($outputPath);
@rmdir($tmpDir);
exit;
