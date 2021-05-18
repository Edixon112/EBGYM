<?php
$user = UserData::getById($_SESSION["user_id"]);
$gym=GymData::getByIdUser($user->id);


$persona= new PersonaData();

$persona->nombre=$_POST["nombre"];
$persona->apellido=$_POST["apellido"];
$persona->telefono=$_POST["telefono"];
$persona->cedula=$_POST["cedula"];
$persona->rol=$_POST["rol"];
$persona->idgym=$gym->id;

$aux=$persona->add();
/*
if($aux[0]==1){

    core::alert("Rewgistro Exitoso");
   
    core::redir("./?view=Persona/ViewPersona");
 
 }else{
 
    core::alert("Error al Registrar");
 
    core::redir("./?view=Persona/ViewPersona");
 }
*/
?>