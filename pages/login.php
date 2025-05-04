<?php require __DIR__ . '/header.php'; ?>
<div class="container">
    <h1>Login</h1>
    <?php
    require __DIR__ . '/../classes/usuarios.class.php';
    $u = new Usuarios();

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = addslashes($_POST['email']);
        $senha = $_POST['senha'];

        if ($u->login($email, $senha)) {
            ?>
            <script type="text/javascript">window.location.href = "/classificados/";</script>
            <?php
        } else {
            ?>
            <div class="alert alert-danger">
                Email e/ou senha estão incorretos!
            </div>
            <?php
        }
    }
    ?>
    <form method="POST" action="login.php">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
        </div>
        <input type="submit" value="Fazer Login" class="btn btn-primary">
        <?php require __DIR__ . '/footer.php'; ?>