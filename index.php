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
            <form class="form-login">
                <h1>Login</h1>
                <hr>
                <div class="inp">
                    <label for="">Seu e-mail</label>
                    <input type="email" placeholder="seuemail@superbicho.com">
                </div>
                <div class="inp">
                    <label for="">Seu e-mail</label>
                    <input type="password" placeholder="**************************">
                </div>
                <button class="btn-principal">Entrar</button>
                <a href="src/view/dashboard.php" class="btn-principal">Entrar</a>
            </form>
        </div>
        <div class="footer-card-login">

        </div>
    </div>
</div>
</body>
</html>

<?php
