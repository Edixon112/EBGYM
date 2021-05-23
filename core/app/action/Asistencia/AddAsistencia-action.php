<?php
$user = UserData::getById($_SESSION["user_id"]);
$gym=GymData::getByIdUser($user->id);

if($_POST["pago"]=="si"){

    $pago=new PagoData();
   
    $pago->idcliente = $_POST["idcliente"];
    $pago->fechainicio = date("Y-m-d H:i:s"); 
    $pago->idgym=$gym->id;
    $aux=$pago->add();
}


date_default_timezone_set("America/Bogota");

$asistencia = new AsistenciaData();
$tiempo = new DateTime('0000-00-00 00:00:00');

$asistencia->idcliente = $_POST["idcliente"]; 
$asistencia->fechainicio = date("Y-m-d H:i:s"); 
$asistencia->idgym=$gym->id;
$asistencia->fechafin = $tiempo->format('Y-m-d H:i:s');
if($_POST["pago"]=="si"){
$asistencia->idpago=$aux[1];
}else $asistencia->idpago=NULL;

$aux1=$asistencia->add();

core::redir("./?view=Asistencia/ViewAsistencia");

?>