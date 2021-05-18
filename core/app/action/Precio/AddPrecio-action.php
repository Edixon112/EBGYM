<?php
$user = UserData::getById($_SESSION["user_id"]);
$gym=GymData::getByIdUser($user->id);


$precio=new PrecioData();

$precio->precio=$_POST["precio"];
$precio->nombre=$_POST["nombre"];
$precio->idgym=$gym->id;
$precio->add();

?>