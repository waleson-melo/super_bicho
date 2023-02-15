<?php include __DIR__ . "/../templates/head.php"; ?>
<?php require __DIR__ . "/../templates/header.php"; ?>
<?php include __DIR__ . "/../templates/message.php"; ?>

    <div class="side-menu">
        <a href="<?= URL_BASE ?>/" class="btn-side-menu">Dashboard</a>
        <a href="<?= URL_BASE ?>/servicos" class="btn-side-menu">Serviços</a>
        <a href="<?= URL_BASE ?>/clientes" class="btn-side-menu  btn-side-menu-selected">Clientes</a>
        <a href="<?= URL_BASE ?>/usuarios" class="btn-side-menu">Usuários</a>
    </div>

    <main class="container-main">
        <h2>Cliente</h2>
        <div class="content">
            <h4>Cadastrar Cliente</h4>
            <div class="margin-top-10px content-table">
                <form method="POST"
                      action="<?= isset($data["id"]) ? URL_BASE . "/clientes/editar/{$data["id"]}" : URL_BASE . "/clientes/novo" ?>">
                    <input type="hidden" name="id" value="<?= !empty($client["idc"]) ? $client["idc"] : "" ?>">

                    <div style="display: flex; flex-wrap: wrap; justify-content: space-between">
                        <div style="width: 48%;">
                            <div class="input-content">
                                <label>cpf</label>
                                <input type="text" name="cpf"
                                       value="<?= !empty($client["cpf"]) ? $client["cpf"] : "" ?>" class="input">
                            </div>

                            <div class="input-content">
                                <label>nome</label>
                                <input type="text" name="nome"
                                       value="<?= !empty($client["nome"]) ? $client["nome"] : "" ?>" class="input">
                            </div>
                        </div>

                        <div style="width: 48%;">
                            <div class="input-content">
                                <label>telefone</label>
                                <input type="text" name="telefone"
                                       value="<?= !empty($client["telefone"]) ? $client["telefone"] : "" ?>"
                                       class="input">
                            </div>


                            <div class="input-content">
                                <label>email</label>
                                <input type="text" name="email"
                                       value="<?= !empty($client["email"]) ? $client["email"] : "" ?>" class="input">
                            </div>
                        </div>

                        <div class="input-content height-100">
                            <label>endereço</label>
                            <input type="text" name="endereco"
                                   value="<?= !empty($client["endereco"]) ? $client["endereco"] : "" ?>"
                                   class="input">
                        </div>
                    </div>

                    <div class="margin-top-10px" style="display: flex;">
                        <input type="submit" class="btn btn-primary" title="Salvar">
                        <a href="<?= URL_BASE ?>/clientes" class="btn-link btn-danger">Cancelar</a>
                    </div>


                </form>
            </div>
        </div>
    </main>


<?php include __DIR__ . "/../templates/footer.php"; ?>