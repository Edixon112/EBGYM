<?php


$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$cedula=$_POST["cedula"];
$telefono=$_POST["telefono"];
$idgym=$_POST["idgym"];
$tipo=$_POST["tipo"];    

$admin=new AdminData();

$admin->nombre=$nombre;
$admin->apellido=$apellido;
$admin->cedula=$cedula;
$admin->telefono=$telefono;
$admin->idgym=$idgym;
$admin->tipo=$tipo;

$aux=$admin->add();

if($aux[0]==1){

    core::alert("Registrado con exito");

    core::redir("./?view=Admin/AddAdmin");
    
}else{

    core::alert("Error al Registrar");

    core::redir("./?view=Admin/AddAdmin");
}

?>