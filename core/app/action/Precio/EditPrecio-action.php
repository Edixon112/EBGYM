<?php 

$precio=PrecioData::getById($_POST["id"]);

$precio->nombre=$_POST["nombre"];
$precio->precio=$_POST["precio"];
$aux=$precio->update();


if($aux[0]==1){

    core::alert("Modificacion Exitosa");
   
    core::redir("./?view=Precio/ViewPrecio");
 
 }else{
 
    core::alert("Error al Modificar");
 
    core::redir("./?view=Precio/ViewPrecio");
 }

?>