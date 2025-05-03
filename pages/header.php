<?php require __DIR__ . '/../config.php'; ?>
<html>
<head>
    <title>Classificados</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="./" class="navbar-brand">Classificados</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <?php if (isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])) : ?>
                <li><a href="meus-anuncios.php">Meus anuncios</a></li>
                <li><a href="sair.php">Sair</a></li>
            <?php else: ?>
                <li><a href="../pages/cadastre-se.php">Cadastre-se</a></li>
                <li><a href="../pages/login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
