<?php
 $user = UserData::getById($_SESSION["user_id"]);
$gym=GymData::getByIdUser($user->id);

if($_POST["pago"]=="si"){

    $pago=new PagoData();
   
    $pago->idcliente=$_POST["idcliente"];
    $pago->fechainicio=date("Y-m-d H:i:s"); 
    $pago->idgym=$gym->id;
$aux=$pago->add();
}


date_default_timezone_set("America/Bogota");

$asistencia=new AsistenciaData();

$asistencia->idcliente = $_POST["idcliente"]; 
$asistencia->fechainicio = date("Y-m-d H:i:s"); 
$asistencia->idgym=$gym->id;
$asistencia->idpago=$aux[1];

$aux=$asistencia->add();






?>