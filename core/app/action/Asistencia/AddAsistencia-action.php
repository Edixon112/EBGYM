<?php

date_default_timezone_set("America/Bogota");

$asistencia=new AsistenciaData();

$asistencia->idcliente = $_POST["idcliente"]; 
$asistencia->fechainicio = date("Y-m-d H:i:s"); 

$aux=$asistencia->add();



if($_POST["pago"]=="si"){

    $pago=new PagoData();
    $pago->idasistencia=$aux[1];
    $pago->idcliente=$_POST["idcliente"];
    $pago->fechainicio=date("Y-m-d H:i:s"); 

$pago->add();
}


?>