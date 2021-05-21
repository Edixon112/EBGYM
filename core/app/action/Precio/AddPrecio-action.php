<?php
$user = UserData::getById($_SESSION["user_id"]);
$gym=GymData::getByIdUser($user->id);


$precio=new PrecioData();

$precio->precio=$_POST["precio"];
$precio->nombre=$_POST["nombre"];
$precio->idgym=$gym->id;
$aux=$precio->add();

if($aux[0]==1){

    core::alert("Precio Registrado");
   
    core::redir("./?view=Precio/ViewPrecio");
 
}else{
 
    core::alert("Error al Registrar Precio");
 
    core::redir("./?view=Precio/ViewPrecio");
}

?>