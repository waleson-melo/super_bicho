<?php
    include("conexao.php");
    session_start();

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
    <div class="container-message">
        <div class="message-error">
            <p>Erro ao entrar. Login ou Senha incorreto(s)!</p>
            <button class="btn-alert">X</button>
        </div>
    </div>
    <div class="container-login">
        <div class="card-login">
            <img src="static/img/gato.jpg" alt="gatinho">
            <div class="content-login">
                <form class="form-login" method="POST" action="logar.php">
                    <h1>Login</h1>
                    <hr>
                    <div class="inp">
                        <label for="login_user">Seu e-mail</label>
                        <input id="login_user" name="login_user" required="required" type="email" placeholder="seuemail@superbicho.com">
                    </div>
                    <div class="inp">
                        <label for="senha_user">Sua senha</label>
                        <input id="senha_user" name="senha_user" required="required" type="password" placeholder="**************************">
                    </div>
                    
                    <div>
                        <input class="btn-principal" type="submit" value="Logar"></input>
                    </div>
                    <button class="btn-principal"><a href="primeiro_acesso.php" class="btn-principal">Primeiro Acesso</a></button>
                    

                </form>
            </div>
            <div class="footer-card-login">

            </div>
        </div>
    </div>
</body>

</html>