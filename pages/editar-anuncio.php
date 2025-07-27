<?php require 'header.php'; ?>
<?php
if (empty($_SESSION['cLogin'])) {
    ?>
    <script type="text/javascript">window.location.href = "meus-anuncios.php";</script>
    <?php
    exit;
}
require __DIR__ . '/../classes/anuncios.class.php';

$a = new Anuncios();
if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
    $titulo = addslashes($_POST['titulo']);
    $valor = addslashes($_POST['valor']);
    $descricao = addslashes($_POST['descricao']);
    $estado = addslashes($_POST['estado']);
    $categoria = addslashes($_POST['categoria']);


    if ($a->addAnuncio($titulo, $valor, $descricao, $estado, $categoria)) {
        ?>
        <div class="alert alert-success">
            Anúncio editado com sucesso!
        </div>
        <?php
    }
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $info = $a->getAnuncio($_GET['id']);
} else { ?>
    <script type="text/javascript">window.location.href = "meus-anuncios.php";</script>
    <?php
    exit;
}

$info = $a->getAnuncio($_GET['id']);

?>
<div class="container">
    <h1> Meus Anúncios - Editar Anúncio </h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select name="categoria" id="categoria" class="form-control">
                <?php
                require __DIR__ . '/../classes/categoria.class.php';

                $c = new Categorias();
                $cats = $c->getLista();
                foreach ($cats as $cat):
                    ?>
                    <option value="<?php echo $cat['id']; ?>" <?php echo ($info['id_categoria'] == $cat['id']) ? '
                selected="selected"' : ''; ?>><?php echo $cat['nome']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Título</label>
            <input name="titulo" id="titulo" class="form-control" value="<?php echo $info['titulo']; ?>">
            <option value="">Selecione um título</option>
            </input>
        </div>
        <div class="form-group">
            <label for="valor">Valor</label>
            <input name="valor" id="valor" class="form-control" value="<?php echo $info['valor']; ?>">
            <option value="">Selecione um valor</option>
            </input>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" name="descricao"><?php echo $info['descricao']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="estado">Estado de Conservação</label>
            <select name="estado" id="estado" class="form-control">
                <option value="0" <?php echo ($info['estado'] == '0') ? '
                selected="selected"' : ''; ?>>Ruim</option>
                <option value="1" <?php echo ($info['estado'] == '1') ? '
                selected="selected"' : ''; ?>>Bom</option>
                <option value="2" <?php echo ($info['estado'] == '2') ? '
                selected="selected"' : ''; ?>>Ótimo</option>
            </select>
        </div>
        <input type="submit" value="Editar Anúncio" class="btn btn-primary" />

    </form>
</div>

<?php require __DIR__ . '/footer.php'; ?>