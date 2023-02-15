<?php include __DIR__ . "/../templates/head.php"; ?>
<?php require __DIR__ . "/../templates/header.php"; ?>
<?php include __DIR__ . "/../templates/message.php"; ?>

    <div class="side-menu">
        <a href="<?= URL_BASE ?>/" class="btn-side-menu">Dashboard</a>
        <a href="<?= URL_BASE ?>/servicos" class="btn-side-menu">Serviços</a>
        <a href="<?= URL_BASE ?>/clientes" class="btn-side-menu">Clientes</a>
        <a href="<?= URL_BASE ?>/usuarios" class="btn-side-menu btn-side-menu-selected">Usuários</a>
    </div>

    <main class="container-main">
        <h2>Usuário</h2>
        <div class="content">
            <h4>Cadastrar Usuário</h4>
            <div class="margin-top-10px content-table">
                <form method="POST"
                      action="<?= isset($data["id"]) ? URL_BASE . "/usuarios/editar/{$data["id"]}" : URL_BASE . "/usuarios/novo" ?>">
                    <input type="hidden" name="pessoa" value="<?= !empty($user["pessoa"]) ? $user["pessoa"] : "" ?>">

                    <div style="display: flex; flex-wrap: wrap; justify-content: space-between">
                        <div style="width: 48%;">
                            <div class="input-content">
                                <label>cpf</label>
                                <input type="text" name="cpf" value="<?= !empty($user["cpf"]) ? $user["cpf"] : "" ?>"
                                       class="input">
                            </div>

                            <div class="input-content">
                                <label>nome</label>
                                <input type="text" name="nome" value="<?= !empty($user["nome"]) ? $user["nome"] : "" ?>"
                                       class="input">
                            </div>

                            <div class="input-content">
                                <label>telefone</label>
                                <input type="text" name="telefone"
                                       value="<?= !empty($user["telefone"]) ? $user["telefone"] : "" ?>" class="input">
                            </div>
                        </div>

                        <div style="width: 48%">
                            <div class="input-content">
                                <label>email</label>
                                <input type="text" name="email"
                                       value="<?= !empty($user["email"]) ? $user["email"] : "" ?>"
                                       class="input">
                            </div>

                            <div class="input-content">
                                <label>Senha</label>
                                <input type="text" name="senha" class="input">
                            </div>

                            <div class="input-content">
                                <label>Tipo de usuário</label>
                                <select name="tipousuario" class="input">
                                    <?php if (!empty($user["telefone"])) :
                                        if ($user["tipo-usuario"] == "admin") : ?>
                                            <option value="admin" selected>Administrador</option>
                                            <option value="funci">Funcionario</option>
                                        <?php else : ?>
                                            <option value="admin">Administrador</option>
                                            <option value="funci" selected>Funcionario</option>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <option value="admin">Administrador</option>
                                        <option value="funci">Funcionario</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="input-content width-100">
                            <label>endereço</label>
                            <input type="text" name="endereco"
                                   value="<?= !empty($user["endereco"]) ? $user["endereco"] : "" ?>" class="input">
                        </div>
                    </div>

                    <div class="margin-top-10px" style="display: flex;">
                        <input type="submit" class="btn btn-primary" title="Salvar">
                        <a href="<?= URL_BASE; ?>/usuarios" class="btn-link btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </main>


<?php include __DIR__ . "/../templates/footer.php"; ?>