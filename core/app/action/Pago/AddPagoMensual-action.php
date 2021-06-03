<?php

date_default_timezone_set("America/Bogota");

$user = UserData::getById($_SESSION["user_id"]);

$gym = GymData::getByIdUser($user->id);

$pago = new PagoData();

$pago->idcliente = $_POST["idcliente"];
echo $_POST["validacion"];

if ($_POST["validacion"] == "si") {

   $fecha2 = new DateTime($_POST["fecha1"]);
   $fechamanual = $fecha2->format('Y-m-d H:i:s');

   $pago->fechainicio = $fechamanual;

   echo "$fechamanual";
} else {

   $pago->fechainicio = date("Y-m-d H:i:s");
}

$pago->idgym = $gym->id;
$pago->estado = intval($_POST["pago"]);
$pago->inscripcion = 1;


$aux = $pago->add();



if ($aux[0] == 1) {

   core::alert("Registro Exitoso");

   //core::redir("./?view=Pago/ViewPago");
} else {

   core::alert("Error al Registrar");

   //core::redir("./?view=Pago/ViewPago");
}
