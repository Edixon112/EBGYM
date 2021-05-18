<?php

$user = UserData::getById($_SESSION["user_id"]);
$gym=GymData::getByIdUser($user->id);



    $asistencia=AsistenciaData::getById($_POST["id"]);
   $pago=new PagoData();
   $pago->idasistencia=$_POST["id"];
   $pago->idcliente=$asistencia->idcliente;
   $pago->fechainicio=date("Y-m-d H:i:s"); 
   $pago->idgym=$gym->id;
    $pago->add();

            
        $asistencia->fechafin = date("Y-m-d H:i:s"); 
        $asistencia->idgym=$gym->id;


        $aux=$asistencia->Out();


?>