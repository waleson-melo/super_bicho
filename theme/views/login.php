<?php include __DIR__ . "/../templates/head.php"; ?>

<?php include __DIR__ . "/../templates/message.php"; ?>

    <div class="container-login">
        <div class="card-login">
            <img src="<?= URL_BASE ?>/theme/assets/img/gato.jpg" alt="gatinho">
            <div class="content-login">
                <form class="form-login" method="POST" action="<?= URL_BASE ?>/login">
                    <h1>Login</h1>
                    <hr>
                    <div class="input-content">
                        <label for="login_user">Seu e-mail</label>
                        <input id="login_user" name="email" type="email"
                               placeholder="seuemail@superbicho.com" class="input">
                    </div>
                    <div class="input-content">
                        <label for="senha_user">Sua senha</label>
                        <input id="senha_user" name="password" type="password"
                               placeholder="**************************" class="input">
                    </div>

                    <button class="btn btn-primary width-100 margin-top-10px" type="submit">Entrar</button>
                </form>
            </div>
            <div class="footer-card-login">

            </div>
        </div>
    </div>

<?php include __DIR__ . "/../templates/footer.php"; ?>