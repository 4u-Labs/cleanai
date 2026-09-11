<p align="center">
  <img src="icon-512.png" width="128" height="128" alt="CleanAI 4U Icon" style="border-radius: 28px; box-shadow: 0 10px 30px rgba(16, 185, 129, 0.4);" />
</p>

# 🛡️ CleanAI 4U — Removedor de Metadados e Assinaturas de IA

> **Higienizador de mídias (Fotos e Vídeos) para proteção de privacidade e neutralização de marcações automáticas de IA (*"Made with AI"* / C2PA / Content Credentials).**

🔗 **Acesse online:** [https://4u.ia.br/app/cleanai/](https://4u.ia.br/app/cleanai/)

---

## 💡 Por que o CleanAI?

Plataformas como **X (Twitter), Instagram e TikTok** implementaram sistemas de rotulagem compulsória baseados em:
1. **Manifestos C2PA (Content Credentials)**: Metadados embutidos no cabeçalho binário de arquivos por ferramentas como DALL-E, Midjourney, Adobe Firefly e Runway (`digitalSourceType: trainedAlgorithmicMedia`).
2. **Metadados EXIF/XMP/IPTC**: Dados de rastreio de software, câmeras e histórico de geração.
3. **Marcas d'água esteganográficas**: Padrões estatísticos sutis embutidos diretamente nos pixels da imagem (como SynthID).

O **CleanAI 4U** higieniza os arquivos eliminando esses rastros para restaurar sua privacidade e controle sobre seu conteúdo.

---

## ✨ Principais Recursos

- 📸 **Higienização de Fotos 100% Client-Side:**
  - Descarte completo de manifestos C2PA, EXIF, GPS e XMP via re-renderização por Canvas HTML5 isolado.
  - Zero upload para imagens: seus dados nunca saem do seu próprio dispositivo.
- 👻 **Modo Fantasma (Bypass Óptico Anti-SynthID):**
  - Aplicação opcional de micro-variação de ruído esteganográfico imperceptível (0.2%) que neutraliza algoritmos de detecção baseados em frequência e textura.
- 🎥 **Higienização de Vídeos (MP4 / MOV):**
  - Scanner de contêiner ISO BMFF para isolamento e descarte de caixas de metadados (`c2pa`, `uuid`).
  - Motor de remuxing rápido com FFmpeg (`-map_metadata -1 -c copy`) sem perda de qualidade e sem re-encode lento.
- 🔬 **Raio-X de Metadados (Comparativo Antes vs Depois):**
  - Auditoria profunda interativa que inspeciona o arquivo original e comprova a purga de 100% dos rastros no arquivo limpo.
- 📦 **Download Individual ou em Lote ZIP:**
  - Compactação instantânea no navegador com `JSZip`.
- 🌓 **Interface 4U Elite:**
  - Temas Escuro e Claro, design glassmorphic ultra responsivo e páginas institucionais completas (Termos de Uso, Política de Privacidade e Suporte).

---

## 🛠️ Tecnologias Utilizadas

- **Frontend:** HTML5, CSS3 Moderno (Variáveis CSS, Backdrop Filter), Vanilla JavaScript (ES6+), FontAwesome 6.
- **Bibliotecas:** `exif-js` (extração de EXIF), `JSZip` (geração de arquivos compactados).
- **Backend (Vídeos):** PHP 8+, FFmpeg (Remuxing lossless).
- **Segurança & Privacidade:** Arquitetura de retenção zero e execução local.

---

## 👨‍💻 Desenvolvido por

- **4u-Labs** — [4u.ia.br](https://4u.ia.br)
- Autor: **Fabiano Braga** (ORCID: [0009-0004-5936-5060](https://orcid.org/0009-0004-5936-5060))
- Repositório: [https://github.com/4u-Labs/cleanai](https://github.com/4u-Labs/cleanai)
- Licença: MIT
