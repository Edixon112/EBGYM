<?php

$api = new ApiData();

$api->token = $_POST["token"];
$api->instanceid = $_POST["instanceid"];
$api->telefono = $_POST["telefono"];
$api->idgym = $_POST["idgym"];

$aux = $api->add();

if ($aux[0] == 1) {

    core::alert("Api Registrado");

    core::redir("./?view=Api/ViewApi");
} else {

    core::alert("Error al Registrar Api");

    core::redir("./?view=Api/ViewApi");
}
