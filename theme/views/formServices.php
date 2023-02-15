<?php include __DIR__ . "/../templates/head.php"; ?>
<?php require __DIR__ . "/../templates/header.php"; ?>
<?php include __DIR__ . "/../templates/message.php"; ?>

<div class="side-menu">
    <a href="<?= URL_BASE ?>/" class="btn-side-menu">Dashboard</a>
    <a href="<?= URL_BASE ?>/servicos" class="btn-side-menu btn-side-menu-selected">Serviços</a>
    <a href="<?= URL_BASE ?>/clientes" class="btn-side-menu">Clientes</a>
    <a href="<?= URL_BASE ?>/usuarios" class="btn-side-menu">Usuários</a>
</div>

<main class="container-main">
    <h2>Serviço</h2>
    <div class="content">
        <h4>Cadastrar Serviço</h4>
        <div class="margin-top-10px content-table">
            <form method="POST"
                  action="<?= isset($data["id"]) ? URL_BASE . "/servicos/editar/{$data["id"]}" : URL_BASE . "/servicos/novo" ?>">

                <input type="hidden" name="id" value="<?= !empty($servico["id"]) ? $servico["id"] : "" ?>">

                <div class="input-content">
                    <label>Nome</label>
                    <input type="text" name="nome" value="<?= !empty($servico["nome"]) ? $servico["nome"] : "" ?>" class="input">
                </div>

                <div class="input-content">
                    <label>Valor</label>
                    <input type="text" name="valor" value="<?= !empty($servico["valor"]) ? $servico["valor"] : "" ?>" class="input">
                </div>

                <div class="input-content">
                    <label>Descricao</label>
                    <input type="text" name="descricao"
                           value="<?= !empty($servico["descricao"]) ? $servico["descricao"] : "" ?>" class="input">
                </div>

                <div class="margin-top-10px" style="display: flex;">
                    <input type="submit" class="btn btn-primary" title="Salvar">
                    <a href="<?= URL_BASE ?>/servicos" class="btn-link btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</main>


<?php include __DIR__ . "/../templates/footer.php"; ?>
