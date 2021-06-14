<?php

date_default_timezone_set("America/Bogota");

$user = UserData::getById($_SESSION["user_id"]);

$gym = GymData::getByIdUser($user->id);

$asistencia = AsistenciaData::getById($_POST["id"]);

$pago = new PagoData();

$pago->idcliente = $asistencia->idcliente;
$pago->fechainicio = date("Y-m-d H:i:s");
$pago->idgym = $gym->id;
$pago->estado = 1;


$aux = $pago->add();


$asistencia->fechafin = date("Y-m-d H:i:s");
$asistencia->idgym = $gym->id;
$asistencia->idpago = $aux[1];

$aux2 = $asistencia->Out();

$direccion = $_POST["view"];


if ($direccion == 'Asistencia/ViewAsistencia') {

    core::redir("./?view=Asistencia/ViewAsistencia");
} else {

    core::redir("./?view=Pago/ViewPago");
}
