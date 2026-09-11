<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
$year = date('Y');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termos de Uso - CleanAI 4U | 4U.IA.BR</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --brand-primary: #10b981;
            --brand-cyan: #06b6d4;
            --bg-dark: #060a12;
            --bg-card: rgba(15, 23, 42, 0.9);
            --border-card: rgba(255, 255, 255, 0.1);
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            background: var(--bg-dark);
            color: #f1f5f9;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .terms-container {
            max-width: 820px;
            width: 100%;
            background: var(--bg-card);
            border: 1px solid var(--border-card);
            border-radius: 28px;
            padding: 44px;
            backdrop-filter: blur(20px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
        }
        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--brand-primary);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 700;
            padding: 8px 16px;
            border-radius: 12px;
            background: rgba(16, 185, 129, 0.12);
            border: 1px solid rgba(16, 185, 129, 0.25);
            transition: all 0.2s ease;
        }
        .back-btn:hover {
            background: rgba(16, 185, 129, 0.22);
            transform: translateY(-1px);
        }
        .brand-badge {
            font-size: 0.75rem;
            font-weight: 800;
            color: var(--brand-cyan);
            background: rgba(6, 182, 212, 0.12);
            border: 1px solid rgba(6, 182, 212, 0.25);
            padding: 4px 12px;
            border-radius: 8px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        h1 {
            color: #ffffff;
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        h1 i { color: var(--brand-primary); }
        .subtitle {
            color: #94a3b8;
            font-size: 0.95rem;
            margin-bottom: 32px;
            line-height: 1.6;
        }
        .term-block {
            margin-bottom: 26px;
        }
        .term-block h2 {
            color: var(--brand-primary);
            font-size: 1.15rem;
            margin-bottom: 8px;
            font-weight: 700;
        }
        .term-block p {
            color: #cbd5e1;
            font-size: 0.9rem;
            line-height: 1.7;
        }
        .highlight {
            color: #ffffff;
            font-weight: 600;
        }
        .footer-info {
            margin-top: 36px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            text-align: center;
            font-size: 0.8rem;
            color: #64748b;
        }
        .footer-info a {
            color: var(--brand-cyan);
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="terms-container">
        <div class="header-top">
            <a href="index.html" class="back-btn"><i class="fas fa-arrow-left"></i> Voltar ao CleanAI</a>
            <span class="brand-badge">4U.IA.BR Labs</span>
        </div>

        <h1><i class="fas fa-file-shield"></i> Termos de Uso</h1>
        <p class="subtitle">Diretrizes de utilização da ferramenta CleanAI 4U — Sanitizador de Metadados e Preservador de Privacidade.</p>

        <div class="term-block">
            <h2>1. Finalidade e Propósito</h2>
            <p>O <strong>CleanAI 4U</strong> foi desenvolvido para permitir a higienização de arquivos digitais (imagens e vídeos), expurgando etiquetas ocultas de metadados, identificadores de procedência, geolocalização e histórico de edição com fins de preservação de privacidade e desvinculação de rastros digitais.</p>
        </div>

        <div class="term-block">
            <h2>2. Processamento Local e Privacidade Integral</h2>
            <p>Todo o processamento de imagens é realizado <span class="highlight">100% de forma local no navegador do usuário</span> através da API Canvas, sem que nenhuma imagem seja enviada para a nuvem. Vídeos que utilizem o serviço de remuxing temporário são eliminados imediatamente da memória do servidor após o download.</p>
        </div>

        <div class="term-block">
            <h2>3. Responsabilidade do Usuário</h2>
            <p>O usuário é o único responsável pelos arquivos sanitizados e pela conformidade das publicações com os termos de serviço das plataformas terceiras onde os conteúdos forem veiculados.</p>
        </div>

        <div class="term-block">
            <h2>4. Gratuidade e Disponibilidade</h2>
            <p>A ferramenta é fornecida gratuitamente pelo ecossistema <strong>4U.IA.BR</strong> sem garantias implícitas e sem cobrança por volume de uso.</p>
        </div>

        <div class="footer-info">
            &copy; <?= $year ?> CleanAI 4U &bull; Desenvolvido por <a href="https://4u.ia.br" target="_blank">4U.IA.BR</a> &bull; Código no <a href="https://github.com/4u-Labs/cleanai" target="_blank">GitHub</a>
        </div>
    </div>
</body>
</html>
