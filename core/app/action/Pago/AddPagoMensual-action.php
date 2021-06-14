<?php

echo  $_POST["abono"];

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
$plan=PlanData::getByIdCliente($cliente->id);
$precio=PrecioData::getbyId($plan->idprecio);


   $abono = intval($_POST["abono"]);

   if ($abono == $precio->precio) {

      $pago->estado = 1;
      $pago->abono = $abono;


   } else {
      $pago->abono = $abono;
   }
}



$aux = $pago->add();


if ($aux[0] == 1) {

   core::alert("Registro Exitoso");

   core::redir("./?view=Pago/ViewPago");
} else {

   core::alert("Error al Registrar");

   core::redir("./?view=Pago/ViewPago");
}
