<?php

 $_POST["abono"];

date_default_timezone_set("America/Bogota");

$user = UserData::getById($_SESSION["user_id"]);

$gym = GymData::getByIdUser($user->id);

$pago = new PagoData();

$pago->idcliente = $_POST["idcliente"];


if ($_POST["validacion"] == "si") { //validacion de fecha manual


   $fecha2 = new DateTime($_POST["fecha1"]);
   $fechamanual = $fecha2->format('Y-m-d H:i:s');

   $pago->fechainicio = $fechamanual;
} else {


   $pago->fechainicio = date("Y-m-d H:i:s");
}

$pago->idgym = $gym->id;
$pago->estado = intval($_POST["pago"]);


if ($pago->estado == 2 &&  $_POST["abono"] != "") {

   $cliente = PersonaData::getById($pago->idcliente);
   $plan = PlanData::getByIdCliente($cliente->id);
   $precio = PrecioData::getbyId($plan->idprecio);


   $abono = intval($_POST["abono"]);

   if ($abono >= $precio->precio) {

      $pago->estado = 1;
      $pago->abono = $abono;

     

   } else {
      $pago->abono = $abono;

     
   }
}else{
   $cliente = PersonaData::getById($pago->idcliente);
   $plan = PlanData::getByIdCliente($cliente->id);
   $precio = PrecioData::getbyId($plan->idprecio);

   $pago->abono = $precio->precio;

}



$aux = $pago->add();


$abono_add = new AbonoData();

$abono_add->idpago = $aux[1];
if ($pago->estado == 1 ) {

   $abono_add->monto = $precio->precio;

}
 if($pago->estado == 2 ){

   $abono_add->monto = $abono ;

}




if ($_POST["validacion"] == "si") { //validacion de fecha manual


   $fecha2 = new DateTime($_POST["fecha1"]);
   $fechamanual = $fecha2->format('Y-m-d H:i:s');

   $abono_add->fecha= $fechamanual;
} else {

   $abono_add->fecha = date("Y-m-d H:i:s");
}









$abono_add->idgym= $gym->id;
//$abono->idgym=$gym->id;
$abono_add->add();


if ($aux[0] == 1) {

  core::alert("Registro Exitoso");

   core::redir("./?view=Pago/ViewPago");
} else {

   core::alert("Error al Registrar");

  core::redir("./?view=Pago/ViewPago");
}
