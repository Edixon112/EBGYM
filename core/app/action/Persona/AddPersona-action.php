<?php
echo $_POST["nombre"]."<br>";
echo $_POST["apellido"]."<br>";
echo $_POST["telefono"]."<br>";
echo $_POST["cedula"]."<br>";

$persona=new PersonaData();

$persona->nombre=$_POST["nombre"];
$persona->apellido=$_POST["apellido"];
$persona->telefono=$_POST["telefono"];
$persona->cedula=$_POST["cedula"];

$aux=$persona->add();
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