<?php

date_default_timezone_set("America/Bogota");

$user = UserData::getById($_SESSION["user_id"]);

$gym = GymData::getByIdUser($user->id);

$pago = new PagoData();

$pago->idcliente=$_POST["idcliente"];
$pago->fechainicio = date("Y-m-d H:i:s"); 
$pago->idgym=$gym->id;
$pago->estado=intval($_POST["pago"]);

 
$aux=$pago->add();



if($aux[0]==1){

    core::alert("Registro Exitoso");
   
    core::redir("./?view=Pago/ViewPago");
 
 }else{
 
    core::alert("Error al Registrar");
 
    core::redir("./?view=Pago/ViewPago");
 }

?> 