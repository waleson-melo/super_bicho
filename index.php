<?php
require __DIR__ . "/vendor/autoload.php";

session_start();

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

$router->namespace("Source\Controllers");

/*
 * Auth
 */
$router->group(null);
$router->get("/login", "Auth:login");
$router->post("/login", "Auth:login");
$router->get("/logout", "Auth:logout");


/*
 * Serviços
 */
$router->group(null);
$router->get("/", "Schedule:schedules");
$router->get("/agendamento/novo", "Schedule:schedulesAdd");
$router->post("/agendamento/novo", "Schedule:schedulesAdd");
$router->get("/agendamento/editar/{id}", "Schedule:schedulesEdit");
$router->post("/agendamento/editar/{id}", "Schedule:schedulesEdit");
$router->get("/agendamento/visualizar/{id}", "Schedule:schedulesView");


/*
 * Usuário
 */
$router->group("usuarios");
$router->get("/", "User:users");
$router->get("/novo", "User:usersAdd");
$router->post("/novo", "User:usersAdd");
$router->get("/editar/{id}", "User:usersEdit");
$router->post("/editar/{id}", "User:usersEdit");
$router->get("/apagar/{id}", "User:usersDelete");


/*
 * Clientes
 */
$router->group("clientes");
$router->get("/", "Client:clients");
$router->get("/novo", "Client:clientsAdd");
$router->post("/novo", "Client:clientsAdd");
$router->get("/editar/{id}", "Client:clientsEdit");
$router->post("/editar/{id}", "Client:clientsEdit");
$router->get("/apagar/{id}", "Client:clientsDelete");


/*
 * Serviços
 */
$router->group("servicos");
$router->get("/", "Service:services");
$router->get("/novo", "Service:servicesAdd");
$router->post("/novo", "Service:servicesAdd");
$router->get("/editar/{id}", "Service:servicesEdit");
$router->post("/editar/{id}", "Service:servicesEdit");
$router->get("/apagar/{id}", "Service:servicesDelete");


/*
 * ERROS
 */
$router->group("ooops");
$router->get("/{errcode}", "Web:error");


$router->dispatch();

if ($router->error()) {
    $router->redirect("/ooops/{$router->error()}");
}