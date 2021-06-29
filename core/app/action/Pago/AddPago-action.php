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


$cliente = PersonaData::getById($asistencia->idcliente);
$plan=PlanData::getByIdCliente($cliente->id);
$precio=PrecioData::getbyId($plan->idprecio);
$pago->abono=$precio->precio;

$aux = $pago->add();

$abono = new AbonoData();

$abono->idpago = $aux[1];
$abono->monto = $precio->precio;
$abono->fecha = date("Y-m-d H:i:s");
$abono->idgym=$gym->id;
$abono->add();



$asistencia->fechafin = date("Y-m-d H:i:s");
$asistencia->idgym = $gym->id;
$asistencia->idpago = $aux[1];

$aux2 = $asistencia->Out();



$direccion = $_POST["view"];

if ($direccion == 'Asistencia/ViewAsistencia') {

    if ($aux[0] == 1) {

        /*$cliente = PersonaData::getById($asistencia->idcliente);
        $api = ApiData::getInstance();
        $nombre = $cliente->nombre;
        $gyms = $gym->nombre;
        $hora = $asistencia->fechafin;
        $celular = $cliente->telefono;

        $mensaje = " *" . $nombre . "* GRACIAS POR VISITAR *" . $gyms . "*  HORA DE SALIDA *" . $hora . "* ";

        $api->enviarMensajeGeneral($mensaje, $celular);*/

        core::alert("Pago Exitoso");
    } else {

        core::alert("Error al Pagar");
    }

    core::redir("./?view=Asistencia/ViewAsistencia");
} else {

    if ($aux[0] == 1) {

        core::alert("direccion perdida = $direccion");
    } else {

        core::alert("direccion perdida = $direccion");
    }

    core::redir("./?view=Pago/ViewPago");
}
