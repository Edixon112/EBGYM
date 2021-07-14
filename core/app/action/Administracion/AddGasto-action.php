<?php
$user = UserData::getById($_SESSION["user_id"]);
$gym = GymData::getByIdUser($user->id);


$gasto = new GastoData();

$gasto->nombre = $_POST["nombre"];

if ($_POST["validacion"] == "si") { //validacion de fecha manual


    $fecha2 = new DateTime($_POST["fecha1"]);
    $fechamanual = $fecha2->format('Y-m-d H:i:s');
 
    $gasto->fecha = $fechamanual;
 } else {
 
 
    $gasto->fecha = date("Y-m-d H:i:s");
 }

$gasto->gasto = $_POST["gasto"];
$gasto->idgym = $gym->id;


$aux = $gasto->add();

if ($aux[0] == 1) {

    core::alert("Gasto Registrado");

    //core::redir("./?view=Gasto/ViewGasto");
} else {

    core::alert("Error al Registrar Gasto");

    //core::redir("./?view=Gasto/ViewGasto");
}
