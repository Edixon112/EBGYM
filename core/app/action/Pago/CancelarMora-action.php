<?php 

$pago=PagoData::getById($_POST["id"]);

$pago->estado=$_POST["estado"];
$aux=$pago->updateEstado();


if($aux[0]==1){

    core::alert("Pago Exitoso");
   
    core::redir("./?view=Pago/CancelarMora");
 
 }else{
 
    core::alert("Error al Pagar");
 
    core::redir("./?view=Pago/CancelarMora");
 }

?>