
<?php
require 'pages/header.php';
require 'classes/anuncios.class.php';
require 'classes/usuarios.class.php';

$a = new Anuncios();
$u = new Usuarios();
$total_anuncios = $a->getTotalAnuncios();
$total_usuarios = $u->getTotalUsuarios();
$ultimos = $a->getUltimosAnuncios(6);
?>

<div class="container-fluid">
    <div class="jumbotron">
        <h2>Nós temos hoje <?php echo $total_anuncios; ?> anúncios</h2>
        <p>E mais de <?php echo $total_usuarios; ?> usuários cadastrados</p>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <h4>Pesquisa avançada</h4>
        </div>
        <div class="col-sm-8">
            <h4>Últimos anúncios</h4>
            <div class="row">
                <?php foreach($ultimos as $anuncio): ?>
                    <div class="col-sm-4">
                        <div class="card mb-3">
                            <img src="<?php echo !empty($anuncio['url']) ? 'assets/images/anuncios/'.$anuncio['url'] : 'assets/images/default.png'; ?>" class="card-img-top" style="max-height:150px;object-fit:cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($anuncio['titulo']); ?></h5>
                                <p class="card-text">R$ <?php echo number_format($anuncio['valor'],2,',','.'); ?></p>
                                <a href="produto.php?id=<?php echo $anuncio['id']; ?>" class="btn btn-primary btn-sm">Ver anúncio</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php require 'pages/footer.php'; ?>