<?php

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../../static/css/style.css">
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
<form method="POST" action="?action=cadastrar">
    <label>cpf</label>
    <input type="text" name="cpf">
    <label>nome</label>
    <input type="text" name="nome">

    <label>telefone</label>
    <input type="text" name="telefone">
    <label>email</label>
    <input type="text" name="email">
    <label>senha</label>
    <input type="text" name="senha">
    <select name="tipousuario">
        <option value="administrador">Administrador</option>
        <option value="usu">Funcionario</option>
    </select>
    <label>endereço</label>
    <input type="text" name="endereco">

    <button type="submit">Salvar</button>
    <a>Cancelar</a>
</form>
</body>
</html>

