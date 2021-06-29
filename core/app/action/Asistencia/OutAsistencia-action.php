<?php
$user = UserData::getById($_SESSION["user_id"]);
$gym = GymData::getByIdUser($user->id);


date_default_timezone_set("America/Bogota");

$asistencia = AsistenciaData::getById($_POST["id"]);

$asistencia->fechafin = date("Y-m-d H:i:s");
$asistencia->idgym = $gym->id;


$aux = $asistencia->Out();


if ($aux[0] == 1) {

    /*$cliente = PersonaData::getById($asistencia->idcliente);
    $api = ApiData::getInstance();
    $nombre = $cliente->nombre;
    $gyms = $gym->nombre;
    $hora = $asistencia->fechafin;
    $celular = $cliente->telefono;
 
    $mensaje = " *" . $nombre . "* GRACIAS POR VISITAR *" . $gyms . "* HORA DE SALIDA *" . $hora . "* ";
    
 
    $api->enviarMensajeGeneral($mensaje,$celular);*/

    core::redir("./?view=Asistencia/ViewAsistencia");

} else {

    core::alert("Error al Registrar salida");

    core::redir("./?view=Asistencia/ViewAsistencia");
}
