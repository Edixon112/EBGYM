<?php 

$pago=PagoData::getById($_POST["id"]);
$cliente = PersonaData::getById($pago->idcliente);
$plan=PlanData::getByIdCliente($cliente->id);
$precio=PrecioData::getbyId($plan->idprecio);


$pago->estado=1;
$pago->abono=$precio->precio;

$aux=$pago->updateEstado();




if($aux[0]==1){

    core::alert("Pago Exitoso");
   
   core::redir("./?view=Pago/ViewPagoMora");
 
 }else{
 
    core::alert("Error al Pagar");
 
   core::redir("./?view=Pago/ViewPagoMora");
 }

?>