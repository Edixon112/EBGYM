<?php
$user = UserData::getById($_SESSION["user_id"]);
$gym=GymData::getByIdUser($user->id);


$plan= new PlanData();

$plan->idcliente=$_POST["cliente"];
$plan->idprecio=$_POST["precio"];
$plan->idgym=$gym->id;

$aux=$plan->add();

if($aux[0]==1){

    core::alert("Plan Registrado");
   
    core::redir("./?view=Plan/ViewPlan");
 
}else{
 
    core::alert("Error al Registrar Plan");
 
    core::redir("./?view=Plan/ViewPlan");
}



?>