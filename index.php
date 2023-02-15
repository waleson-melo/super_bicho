<?php
session_start();
require_once('src/controller/loginController.php');

$controller = new LoginController();

$action = !empty($_GET['action']) ? $_GET['action'] : null;
$message = !empty($_SESSION['msg']) ? $_SESSION['msg'] : null;

if ($action) {
    $controller->login($_POST['login_user'], $_POST['senha_user']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/style.css">
    <title>Super Bicho</title>
</head>

<body>
<?php
if ($message != null) {
    ?>
    <div class="container-message">
        <div class="message-error">
            <p><?php echo $message; ?></p>
            <button class="btn-alert">X</button>
        </div>
    </div>
    <?php
    unset($_SESSION['msg']);
}
?>
<div class="container-login">
    <div class="card-login">
        <img src="../superbicho/pages/assets/img/gato.jpg" alt="gatinho">
        <div class="content-login">
            <form class="form-login" method="POST" action="?action=login">
                <h1>Login</h1>
                <hr>
                <div class="inp">
                    <label for="login_user">Seu e-mail</label>
                    <input id="login_user" name="login_user" required="required" type="email"
                           placeholder="seuemail@superbicho.com">
                </div>
                <div class="inp">
                    <label for="senha_user">Sua senha</label>
                    <input id="senha_user" name="senha_user" required="required" type="password"
                           placeholder="**************************">
                </div>

                <button class="btn-principal" type="submit">Entrar</button>
            </form>
        </div>
        <div class="footer-card-login">

        </div>
    </div>
</div>
</body>
</html>