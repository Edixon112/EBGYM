<?php
$user = UserData::getById($_SESSION["user_id"]);
$gym=GymData::getByIdUser($user->id);


$plan= new PlanData();

$plan->idcliente=$_POST["cliente"];
$plan->idprecio=$_POST["precio"];
$plan->idgym=$gym->id;

$plan->add();


?>