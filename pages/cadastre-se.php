<?php require __DIR__ . '/header.php'; ?>
<div class="container">
    <h1>Cadastre-se</h1>
    <?php
    require __DIR__ . '/../classes/usuarios.class.php';
    $u = new Usuarios();

    if (isset($_POST['nome']) && !empty($_POST['nome'])) {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = $_POST['senha'];
        $telefone = addslashes($_POST['telefone']);

        if (!empty($nome) && !empty($email) && !empty($senha)) {
            if ($u->cadastrar($nome, $email, $senha, $telefone)) {
                ?>
                <div class="alert alert-success">
                    <strong>Parabéns!</strong> Cadastrado com sucesso. <a href="login.php" class="alert-link">Faça o login agora</a>
                </div>
                <?php
            } else {
                ?>
                <div class="alert alert-warning">
                    Este usuário já existe! <a href="login.php" class="alert-link">Faça o login agora</a>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-warning">
                Preencha todos os campos!
            </div>
            <?php
        }

    }
    ?>
    <form method="POST" action="cadastre-se.php">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" required>
        </div>
        <input type="submit" value="Cadastrar" class="btn btn-primary">
        <?php require __DIR__ . '/footer.php'; ?>