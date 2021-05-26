<?php 

$plan=PlanData::getById($_POST["id"]);

$plan->idprecio=$_POST["idprecio"];
$aux=$plan->update();


if($aux[0]==1){

    core::alert("Modificacion Exitosa");
   
    core::redir("./?view=Plan/ViewPlan");
 
 }else{
 
    core::alert("Error al Modificar");
 
    core::redir("./?view=Plan/ViewPlan");
 }

?>