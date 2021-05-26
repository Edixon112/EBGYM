<?php

date_default_timezone_set("America/Bogota");

$user = UserData::getById($_SESSION["user_id"]);

$gym = GymData::getByIdUser($user->id);

$pago = new PagoData();

$pago->idcliente=$_POST["idcliente"];
$pago->fechainicio = date("Y-m-d H:i:s"); 
$pago->idgym=$gym->id;

$aux=$pago->add();

core::redir("./?view=Pago/ViewPago");

?>