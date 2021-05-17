<?php


$admin = AdminData::getById($_POST["id"]);

$admin->$nombre=$_POST["nombre"];
$admin->$apellido=$_POST["apellido"];
$admin->$cedula=$_POST["cedula"];
$admin->$telefono=$_POST["telefono"];
$admin->$idgym=$_POST["idgym"];
$admin->$tipo=$_POST["tipo"];   

$aux=$admin->update();

if($aux[0]==1){

    core::alert("Modificado con exito");
    
    core::redir("./?view=Admin/EditAdmin");
    
}else{

    core::alert("Error al Modificar");

    core::redir("./?view=Admin/EditAdmin");
}
?>