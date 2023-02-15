<?php include __DIR__ . "/../templates/head.php"; ?>
<?php require __DIR__ . "/../templates/header.php"; ?>
<?php include __DIR__ . "/../templates/message.php"; ?>

    <div class="side-menu">
        <a href="<?= URL_BASE ?>/" class="btn-side-menu btn-side-menu-selected">Dashboard</a>
        <a href="<?= URL_BASE ?>/servicos" class="btn-side-menu">Serviços</a>
        <a href="<?= URL_BASE ?>/clientes" class="btn-side-menu">Clientes</a>
        <a href="<?= URL_BASE ?>/usuarios" class="btn-side-menu">Usuários</a>
    </div>

    <main class="container-main">
        <h2>Agendamento</h2>
        <div class="content">
            <h4>Visualizar Agendamento</h4>
            <div class="margin-top-10px content-table">
                <div style="display: flex; flex-wrap: wrap; justify-content: space-between">
                    <div style="width: 48%;">
                        <div class="input-content">
                            <label>Cliente</label>
                            <select id="client" name="client" class="input" disabled>
                                <?php foreach ($clients as $item): ?>
                                    <option value="<?= $item["cid"] ?>" <?= (isset($schedule["cliente"]) and $schedule["cliente"] == $item["cid"]) ? "selected" : "" ?>><?= $item["nome"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="input-content">
                            <label>Profissional</label>
                            <select id="user" name="user" class="input" disabled>
                                <?php foreach ($users as $item): ?>
                                    <option value="<?= $item["id"] ?>" <?= (isset($schedule["profissional"]) and $schedule["profissional"] == $item["id"]) ? "selected" : "" ?>><?= $item["nome"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div style="display: flex; justify-content: space-between; flex-wrap: wrap;">
                            <div class="input-content">
                                <label>Data</label>
                                <input type="date" name="date"
                                       value="<?= !empty($schedule["data"]) ? $schedule["data"] : "" ?>"
                                       class="input" disabled>
                            </div>

                            <div class="input-content">
                                <label>Hora</label>
                                <input type="time" name="hour"
                                       value="<?= !empty($schedule["horario"]) ? $schedule["horario"] : "" ?>"
                                       class="input" disabled>
                            </div>

                            <div class="input-content">
                                <label>Valor</label>
                                <input type="number" name="price"
                                       value="<?= !empty($schedule["valor"]) ? $schedule["valor"] : "" ?>"
                                       class="input" disabled>
                            </div>
                        </div>
                    </div>

                    <div style="width: 48%; display: flex; flex-direction: column;">
                        <div style="display: flex; justify-content: space-between">
                            <label>Serviço(s)</label>
                        </div>
                        <div class="container-services">
                            <?php if (isset($servicesSelecteds[0])) : ?>
                                <?php foreach ($servicesSelecteds as $selecteds) : ?>
                                    <input type="hidden" name="idservices[]" value="<?= $selecteds["idas"] ?>">
                                    <select id="service" name="services[]" class="input" disabled>
                                        <?php foreach ($services as $item) : ?>
                                            <option value="<?= $item["id"] ?>" <?= ($item["id"] == $selecteds["id"]) ? "selected" : "" ?>><?= $item["nome"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <select id="service" name="services[]" class="input" disabled>
                                    <?php foreach ($services as $item): ?>
                                        <option value="<?= $item["id"] ?>"><?= $item["nome"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="input-content width-100">
                    <label>Observação</label>
                    <textarea name="observation" class="" cols="30" rows="5"
                              style="resize: none"  disabled><?= !empty($schedule["observacao"]) ? $schedule["observacao"] : "" ?></textarea>
                </div>

                <div class="margin-top-10px" style="display: flex;">
                    <a href="<?= URL_BASE ?>/" class="btn-link btn-primary">Voltar</a>
                </div>

            </div>
        </div>
    </main>

<?php include __DIR__ . "/../templates/footer.php"; ?>