<?php

echo  $_POST["validacionabono"];
echo  $_POST["abono"];


date_default_timezone_set("America/Bogota");

$user = UserData::getById($_SESSION["user_id"]);

$gym = GymData::getByIdUser($user->id);

$pago = new PagoData();

$pago->idcliente = $_POST["idcliente"];


if ($_POST["validacion"] == "si") {


   $fecha2 = new DateTime($_POST["fecha1"]);
   $fechamanual = $fecha2->format('Y-m-d H:i:s');

   $pago->fechainicio = $fechamanual;
} else {


   $pago->fechainicio = date("Y-m-d H:i:s");
}

$pago->idgym = $gym->id;
$pago->estado = intval($_POST["pago"]);

$abono = $_POST["abono"];

if ($_POST["validacionabono"] == "si") {


   if ($pago->abono == null || $pago->abono == 0 and $abono <= 50000) {


      $pago->abono = $abono;
   } else {
      if (($pago->abono) and ($pago->abono + $abono) <= 50000 ) {


         $pago->abono + $abono;
      }
   }
} else {


   $pago->abono = 50000;
}




$aux = $pago->add();



if ($aux[0] == 1) {

   core::alert("Registro Exitoso");

   //core::redir("./?view=Pago/ViewPago");
} else {

   core::alert("Error al Registrar");

   //core::redir("./?view=Pago/ViewPago");
}
