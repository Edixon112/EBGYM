<?php

$user = UserData::getById($_SESSION["user_id"]);
$gym = GymData::getByIdUser($user->id);
date_default_timezone_set("America/Bogota");

$membresia = PlanData::getByIdCliente($_POST["idcliente"]);
$precio = PrecioData::getById($membresia->idprecio);

if ($precio->nombre == "DIARIO") {


    if ($_POST["pago"] == "si") {

        $pago = new PagoData();

        $pago->idcliente = $_POST["idcliente"];
        $pago->fechainicio = date("Y-m-d H:i:s");
        $pago->idgym = $gym->id;
        $pago->estado=1;
        $aux = $pago->add();
    }


    $asistencia = new AsistenciaData();
    $tiempo = new DateTime('0000-00-00 00:00:00');

    $asistencia->idcliente = $_POST["idcliente"];
    $asistencia->fechainicio = date("Y-m-d H:i:s");
    $asistencia->idgym = $gym->id;
    $asistencia->fechafin = $tiempo->format('Y-m-d H:i:s');

    if ($_POST["pago"] == "si") {
        $asistencia->idpago = $aux[1];

        $asistencia->add();
    }
    if ($_POST["pago"] == "no") {
        $asistencia->idpago = NULL;
        $asistencia->addSinPago();
    }


    core::redir("./?view=Asistencia/ViewAsistencia");
} else {


    $pago = PagoData::getByIdCliente2($_POST["idcliente"]);

    $asistencia = new AsistenciaData();
    $tiempo = new DateTime('0000-00-00 00:00:00');

    $asistencia->idcliente = $_POST["idcliente"];
    $asistencia->fechainicio = date("Y-m-d H:i:s");
    $asistencia->idgym = $gym->id;
    $asistencia->fechafin = $tiempo->format('Y-m-d H:i:s');


    $asistencia->idpago = $pago->id;

    $asistencia->add();
    

    core::redir("./?view=Asistencia/ViewAsistencia");
}
