<?php
include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $estado = trim($_POST['estado']);
    $cidade = trim($_POST['cidade']);
    $mensagem = trim($_POST['mensagem']);

    $stmt = $conexao->prepare("INSERT INTO usuarios (nome, email, telefone, estado, cidade, mensagem) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nome, $email, $telefone, $estado, $cidade, $mensagem);

    if ($stmt->execute()) {
        $mensagemDeSucesso = "Dados inseridos com sucesso!";
        echo json_encode(['success' => true, 'message' => $mensagemDeSucesso]);
    } else {
        echo json_encode(['success' => false, 'message' => $stmt->error]);
    }

    $stmt->close();
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Petshop</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="shortcut icon" href="./img/logo2.png" type="image/x-icon">
</head>
<body>
<header class="header">
     <!-- <nav class="caixa_logo">
          <img src="logo.png" alt="Logo Petshop" class="logo">
            <ul class="texto_header">
                <li><a href="#home" class="texto_header2">Home</a></li>
                <li><a href="#contatos" class="texto_header2">Contatos</a></li>
            </ul>
        </nav>-->
    </header> 
    <section id="home" class="background">
        <img src="./img//fundo.jpg" alt="Imagem de fundo" class="background-imagem">
        <p class="texto-imagem">Igreja Batista Nova cidade</p>
    </section>
    <main>
        <section id="sobre" class="section-main">
            <h2 class="section-titulo">Conheça um pouco sobre a Igreja Batista Nova cidade</h2>
            <p class="section-texto">Procurando um lar espiritual acolhedor e vibrante em Guarulhos? A Igreja Batista Nova Cidade convida você a se juntar a nós! Somos uma comunidade unida e apaixonada por Jesus Cristo, que se dedica a amar e servir uns aos outros e à nossa comunidade.</p>
            <ul class="lista-itens">
                <li>Cultos semanais inspiradores e cheios de música, mensagens e orações.</li>
                <li>Grupos pequenos para estudo da Bíblia, crescimento espiritual e comunhão.</li>
                <li>Oportunidades para servir e fazer a diferença no mundo.</li>
                <li>Um ambiente acolhedor e amigável para todas as idades e origens.</li>
            </ul>
        </section>
        <section id="cultos" class="section-culto">
            <h2 class="titulo-culto">Horários dos Cultos</h2>
            <div class="culto-caixa">
                <div class="culto">
                    <h3>Culto das Irmãs</h3>
                    <p>Terça - 19h30</p>
                </div>
                <div class="culto">
                    <h3>Culto de Oração</h3>
                    <p>Quarta - 19h30</p>
                </div>
                <div class="culto">
                    <h3>Culto de Adoração</h3>
                    <p>Domingo - 18:30</p>
                </div>
            </div>
        </section>
        <section id="evento" class="section-evento">
            <h2 class="evento-titulo">Eventos</h2>
            <div class="eventos-container">
                <img src="img/evento1.jpg" alt="Evento 1" class="evento-img">
                <img src="img/evento2.jpg" alt="Evento 2" class="evento-img">
                <img src="img/evento3.jpg" alt="Evento 3" class="evento-img">
            </div>
        </section>
        <section id="contatos" class="formulario">
            <div class="caixa-formulario">
                <h1 class="titulo-formulario">Entre em Contato conosco</h1>
                <div id="success-message" class="success-notification"></div>
                <form id="contact-form" class="contact-form">
                    <label for="nome" class="form-label">Nome Completo:</label>
                    <input type="text" id="nome" name="nome" class="form-input" required>
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" id="email" name="email" class="form-input" required>
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="tel" id="telefone" name="telefone" class="form-input" required>
                    <label for="estado" class="form-label">Estado:</label>
                    <input type="text" id="estado" name="estado" class="form-input" required>
                    <label for="cidade" class="form-label">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" class="form-input" required>
                    <label for="mensagem" class="form-label">Mensagem:</label>
                    <textarea id="mensagem" name="mensagem" rows="10" class="form-input" required></textarea>
                    <div class="button-container">
                        <button type="submit" class="submit-button">Enviar</button>
                    </div>
                </form>
            </div>
        </section>
        <section id="endereco" class="section-mapa">
            <h2 class="section-title">Localização</h2>
            <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3660.233562554307!2d-46.40121690000001!3d-23.4520382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce625f5c3c82b9%3A0x46187daff06d128a!2sR.%20Jardim%20Repouso%20S%C3%A3o%20Francisco%2C%20425%20-%20Parque%20Maria%20Helena%2C%20Guarulhos%20-%20SP%2C%2007261-000!5e0!3m2!1spt-BR!2sbr!4v1733606536739!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <p class="section-mapa">R. Jardim Repouso São Francisco, 425 - Parque Maria Helena</p>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="social-media">
            <a href="https://www.facebook.com/BatistaNovaCidade" target="_blank"><img src="img/facebook.png" alt="Facebook" class="social-icon"></a>
            <a href="https://www.instagram.com/pibnc.gru/?hl=hu" target="_blank"><img src="img/instagram.png" alt="Instagram" class="social-icon"></a>
        </div>
        <p class="footer-text">Petshop Bicho Feliz | Site criado por Wendy Eugenia</p>
    </footer>
    <script  src="./script.js"></script>
</body>
</html>