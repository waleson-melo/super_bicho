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
                <form class="form-login" method="POST" action="salvar.php">
                    <h1>Dados Cadastrais</h1>
                    <hr>
                    <p class="inp">
                        <label for="nome_user">Seu nome</label>
                        <input id="nome_user" name="nome_user" required="required" type="text" placeholder="Seu nome">
                    </p>
                    <p class="inp">
                        <label for="email_user">Seu email</label>
                        <input id="email_user" name="email_user" required="required" type="text" placeholder="seuemail@superbicho.com">
                    </p>

                    <p>
                        <input class="btn-principal" type="submit" value="enviar"></input>
                    </p>

                </form>
            </div>
            <div class="footer-card-login">

            </div>
        </div>
    </div>
</body>

</html>