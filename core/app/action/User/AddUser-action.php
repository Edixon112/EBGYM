<?php

$persona=new PersonaData();

$persona->nombre=$_POST["nombre"];
$persona->apellido=$_POST["apellido"];
$persona->telefono=$_POST["telefono"];
$persona->cedula=$_POST["cedula"];
$persona->rol=$_POST["rol"];
$aux=$persona->add();


$user=new UserData();

$user->user=$_POST["username"];
$user->pass=sha1(md5($_POST["password1"]));
$user->idpersona=$aux[1];
$user->rol=$_POST["rol"];

$user->add();

/*
if($aux[0]==1){

    core::alert("Rewgistro Exitoso");
   
    core::redir("./?view=Persona/UserPersona");
 
 }else{
 
    core::alert("Error al Registrar");
 
    core::redir("./?view=Persona/UserPersona");
 }
*/
?>