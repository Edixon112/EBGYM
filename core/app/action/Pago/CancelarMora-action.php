<?php 

$pago=PagoData::getById($_POST["id"]);
$cliente = PersonaData::getById($pago->idcliente);
$plan=PlanData::getByIdCliente($cliente->id);
$precio=PrecioData::getbyId($plan->idprecio);

$user = UserData::getById($_SESSION["user_id"]);

$gym = GymData::getByIdUser($user->id);


$abono_add = new AbonoData();

$abono_add->idpago = $pago->id;
$abono_add->monto = $precio->precio-($pago->abono);
$abono_add->fecha = date("Y-m-d H:i:s");
$abono_add->idgym=$gym->id;
$abono_add->add();


$pago->estado=1;
$pago->abono=$precio->precio;

$aux=$pago->updateEstado();




if($aux[0]==1){

    core::alert("Pago Exitoso");
   
 //  core::redir("./?view=Pago/ViewPagoMora");
 
 }else{
 
    core::alert("Error al Pagar");
 
  // core::redir("./?view=Pago/ViewPagoMora");
 }

?>