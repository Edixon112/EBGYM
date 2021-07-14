<?php
$user = UserData::getById($_SESSION["user_id"]);

$fecha1 = $_POST["fechainicio"];
$fecha2 = $_POST["fechafinal"];
$ingreso = $_POST["ingresos"];
$gasto = $_POST["gastos"];
$ganacia = $_POST["ganancias"];


$cliente = PersonaData::getById($user->idpersona);
$api = ApiData::getInstance();
$celular = $cliente->telefono;

$mensaje = "INFORME .\n DESDE: *" . $fecha1 . "* HASTA: *" . $fecha2 . "*\n SE HAN GENERADO INGRESOS: *" . $ingreso . "*\n GASTOS: *" . $gasto . "*\n GANANCIAS: *" . $ganacia . "*  ";
$api->instanceid;

$api->token;

$api->enviarMensajeGeneral($mensaje, $celular);

include("core/app/action/Reporte/Reporte-action.php");