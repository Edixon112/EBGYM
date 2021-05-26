<?php 

$persona=PersonaData::getById($_POST["id"]);

$persona->nombre=$_POST["nombre"];
$persona->apellido=$_POST["apellido"];
$persona->telefono=$_POST["telefono"];
$persona->cedula=$_POST["cedula"];

$aux=$persona->update();


if($aux[0]==1){

    core::alert("Modificacion Exitosa");
   
    core::redir("./?view=Persona/ViewPersona");
 
 }else{
 
    core::alert("Error al Modificar");
 
    core::redir("./?view=Persona/ViewPersona");
 }

?>