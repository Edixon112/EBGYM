<?php

$inscripcion=new InscripcionData(); 


$user = UserData::getById($_SESSION["user_id"]);
$gym = GymData::getByIdUser($user->id);



$inscripcion->idgym = $gym->id;




if (intval($_POST["pago"])==2 &&  $_POST["abono"] != "") {

   
    $inscripcion->monto=intval($_POST["abono"]);


 }else{
    $inscripcion->monto=10000;
 
 }




$inscripcion->idcliente= $_POST["idcliente"];



if ($_POST["validacion"] == "si") { //validacion de fecha manual


    $fecha2 = new DateTime($_POST["fecha1"]);
    $fechamanual = $fecha2->format('Y-m-d H:i:s');
 
    $inscripcion->fecha = $fechamanual;
 } else {
 
 
    $inscripcion->fecha = date("Y-m-d H:i:s");
 }


$aux= $inscripcion->add();
 


if ($aux[0] == 1) {
    $Persona=PersonaData::getById($inscripcion->idcliente);
    $Persona->inscripcion = $aux[1];
    $Persona->updateinscripcion();

   
    core::alert("Registro Exitoso");
 
    core::redir("./?view=Pago/AddInscripcion");
 } else {
 
    core::alert("Error al Registrar");
 
    core::redir("./?view=Pago/AddInscripcion");
 }


?>