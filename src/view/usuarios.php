<?php
session_start();
require_once('../controller/usuarioController.php');

$controller = new UsuarioController();

$action = !empty($_GET['action']) ? $_GET['action'] : null;
$message = !empty($_SESSION['msg']) ? $_SESSION['msg'] : null;

if ($action) {
    $controller->cadastrar($_POST['cpf'], $_POST['nome'], $_POST['telefone'], $_POST['email'], $_POST['senha'], $_POST['tipousuario']);
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../static/css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Usuário</title>
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
<h1>Usuários</h1>
<a href="usuarios/formularioUsuario.php">ADD</a>
<p>Tabela de listagem</p>
</body>
</html>
