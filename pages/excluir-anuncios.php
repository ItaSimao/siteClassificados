<?php 
require __DIR__ . '/../config.php';

if (empty($_SESSION['cLogin'])) {
    header('Location: login.php');
    exit;
}

require __DIR__ . '/../classes/anuncios.class.php';
$a = new Anuncios();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $a->excluirAnuncio($_GET['id']);
}

header('Location: meus-anuncios.php');