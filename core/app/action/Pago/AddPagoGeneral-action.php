
<?php

$_POST["abono"];

date_default_timezone_set("America/Bogota");

$user = UserData::getById($_SESSION["user_id"]);

$gym = GymData::getByIdUser($user->id);


$cliente = PersonaData::getById($_POST["idcliente"]);

$pago = PagoData::getByIdCliente2($cliente->id);

$membresia = PlanData::getByIdCliente($cliente->id);
$precio = PrecioData::getById($membresia->idprecio);

if ($precio->nombre == "MENSUAL" ) {

$ahora = date("Y-m-d H:i:s");
$fechaPAGO = $pago->fechainicio;
$unmesdespues = date("Y-m-d H:i:s", strtotime($fechaPAGO . "+ 1 month"));
} 

if ($precio->nombre == "15_DIAS" ) {
   
$ahora = date("Y-m-d H:i:s");
$fechaPAGO = $pago->fechainicio;
$unmesdespues = date("Y-m-d H:i:s", strtotime($fechaPAGO . "+ 15 days"));
}


$pago2=new PagoData();

$pago2->idcliente = $_POST["idcliente"];


   $pago2->fechainicio = $unmesdespues;


$pago2->idgym = $gym->id;
$pago2->estado = intval($_POST["pago"]);


if ($pago2->estado == 2 &&  $_POST["abono"] != "") {

   $cliente = PersonaData::getById($pago2->idcliente);
   $plan = PlanData::getByIdCliente($cliente->id);
   $precio = PrecioData::getbyId($plan->idprecio);


   $abono = intval($_POST["abono"]);

   if ($abono >= $precio->precio) {

      $pago2->estado = 1;
      $pago2->abono = $precio->precio;

     

   } else {
      $pago2->abono = $abono;

     
   }
}else{
    $cliente = PersonaData::getById($pago2->idcliente);
    $plan = PlanData::getByIdCliente($cliente->id);
    $precio = PrecioData::getbyId($plan->idprecio);
 
    if($pago2->estado == 1){
        $pago2->abono = $precio->precio;

    }
  
   if($pago2->estado == 2 && $_POST["abono"] == ""){
      $pago2->abono = 0;
   }
  
}



$aux = $pago2->add();


$abono_add = new AbonoData();

$abono_add->idpago2 = $aux[1];
if ($pago2->estado == 1 ) {

   $abono_add->monto = $precio->precio;

}
 if($pago2->estado == 2 ){
   if($_POST["abono"] == ""){
      $abono_add->monto = 0;
   }else{
       $abono_add->monto = $abono ;
   }
  


}





   $abono_add->fecha= $unmesdespues;








$abono_add->idgym= $gym->id;
//$abono->idgym=$gym->id;
$abono_add->add();


if ($aux[0] == 1) {

  core::alert("Registro Exitoso");

   core::redir("./?view=pago/Viewpago");
} else {

   core::alert("Error al Registrar");

 core::redir("./?view=pago/Viewpago");
}
