<?php
require __DIR__ . '/header.php';

if (empty($_SESSION['cLogin'])) {
    header('Location: login.php');
    exit;
}
require __DIR__ . '/../classes/anuncios.class.php';

$a = new Anuncios();
$anuncios = $a->getMeusAnuncios();
?>

<div class="container">
    <h1>Meus Anúncios</h1>
    <a href="add-anuncio.php" class="btn btn-primary">Adicionar Anúncio</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Título</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php foreach ($anuncios as $anuncio): ?>
            <tr>
                <td>
                    <?php if (!empty($anuncio['url'])): ?>
                        <img src="/classificados/assets/images/anuncios/<?php echo $anuncio['url']; ?>"
                            alt="<?php echo $anuncio['titulo']; ?>" height="50" border="0">
                    <?php else: ?>
                        <img src="/classificados/images/default.png" alt="Imagem padrão" height="50" border="0">
                    <?php endif; ?>
                    http://localhost/classificados/assets/images/default.png
                </td>
                <td><?php echo $anuncio['titulo']; ?></td>
                <td>R$ <?php echo number_format($anuncio['valor'], 2, ',', '.'); ?></td>
                <td>
                    <a href="editar-anuncio.php?id=<?php echo $anuncio['id']; ?>" class="btn btn-primary">Editar</a>
                    <a href="excluir-anuncio.php?id=<?php echo $anuncio['id']; ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>

<?php
require __DIR__ . '/footer.php';
?>