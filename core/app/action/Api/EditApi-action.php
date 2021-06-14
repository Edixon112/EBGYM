<?php

$api = ApiData::getById($_POST["id"]);

$api->token = $_POST["token"];
$api->instanceid = $_POST["instanceid"];
$api->telefono = $_POST["telefono"];
$api->idgym = $_POST["idgym"];

$aux = $api->update();


if ($aux[0] == 1) {

    core::alert("Modificacion Exitosa");

    core::redir("./?view=Api/ViewApi");
} else {

    core::alert("Error al Modificar");

    core::redir("./?view=Api/ViewApi");
}
