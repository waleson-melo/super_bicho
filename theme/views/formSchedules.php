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
            <h4>Realizar Agendamento</h4>
            <div class="margin-top-10px content-table">
                <form method="POST"
                      action="<?= isset($data["id"]) ? URL_BASE . "/agendamento/editar/{$data["id"]}" : URL_BASE . "/agendamento/novo" ?>">

                    <div style="display: flex; flex-wrap: wrap; justify-content: space-between">
                        <div style="width: 48%;">
                            <div class="input-content">
                                <label>Cliente</label>
                                <select id="client" name="client" class="input">
                                    <?php foreach ($clients as $item): ?>
                                        <option value="<?= $item["cid"] ?>" <?= (isset($schedule["cliente"]) and $schedule["cliente"] == $item["cid"]) ? "selected" : "" ?>><?= $item["nome"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="input-content">
                                <label>Profissional</label>
                                <select id="user" name="user" class="input">
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
                                           class="input">
                                </div>

                                <div class="input-content">
                                    <label>Hora</label>
                                    <input type="time" name="hour"
                                           value="<?= !empty($schedule["horario"]) ? $schedule["horario"] : "" ?>"
                                           class="input">
                                </div>

                                <div class="input-content">
                                    <label>Valor</label>
                                    <input type="number" name="price"
                                           value="<?= !empty($schedule["valor"]) ? $schedule["valor"] : "" ?>"
                                           class="input">
                                </div>
                            </div>
                        </div>

                        <div style="width: 48%; display: flex; flex-direction: column;">
                            <div style="display: flex; justify-content: space-between">
                                <label>Serviço(s)</label>
                                <button class="btn btn-img btn-primary" onclick="serviceAddFields()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                         class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="container-services">
                                <?php if (isset($servicesSelecteds[0])) : ?>
                                    <?php foreach ($servicesSelecteds as $selecteds) : ?>
                                        <input type="hidden" name="idservices[]" value="<?= $selecteds["idas"] ?>">
                                        <select id="service" name="services[]" class="input">
                                            <?php foreach ($services as $item) : ?>
                                                <option value="<?= $item["id"] ?>" <?= ($item["id"] == $selecteds["id"]) ? "selected" : "" ?>><?= $item["nome"] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <select id="service" name="services[]" class="input">
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
                                  style="resize: none"><?= !empty($schedule["observacao"]) ? $schedule["observacao"] : "" ?></textarea>
                    </div>

                    <div class="margin-top-10px" style="display: flex;">
                        <input type="submit" class="btn btn-primary" title="Salvar">
                        <a href="<?= URL_BASE ?>/" class="btn-link btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        let servicesConteiner = document.querySelector(".container-services");
        let service = document.querySelector("#service")

        function serviceAddFields() {
            event.preventDefault()
            let btnClone = service.cloneNode(true)
            servicesConteiner.insertAdjacentElement('beforeend', btnClone)
        }

    </script>


<?php include __DIR__ . "/../templates/footer.php"; ?>