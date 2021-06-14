<?php

$api = new ApiData();

echo $api->token = $_POST["token"];
echo $api->instanceid = $_POST["instanceid"];
echo $api->telefono = $_POST["telefono"];
echo $api->idgym = $_POST["idgym"];

$aux = $api->add();

if ($aux[0] == 1) {

    core::alert("Api Registrado");

    core::redir("./?view=Api/ViewApi");
} else {

    core::alert("Error al Registrar Api");

    core::redir("./?view=Api/ViewApi");
}
