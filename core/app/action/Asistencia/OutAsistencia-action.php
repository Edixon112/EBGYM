<?php
$user = UserData::getById($_SESSION["user_id"]);
$gym = GymData::getByIdUser($user->id);


date_default_timezone_set("America/Bogota");

$asistencia = AsistenciaData::getById($_POST["id"]);

$asistencia->fechafin = date("Y-m-d H:i:s");
$asistencia->idgym = $gym->id;


$aux = $asistencia->Out();


if ($aux[0] == 1) {


    core::redir("./?view=Asistencia/ViewAsistencia");
} else {

    core::alert("Error al Registrar salida");

    core::redir("./?view=Asistencia/ViewAsistencia");
}
