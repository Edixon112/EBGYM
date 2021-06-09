<?php

$pago = PagoData::getById($_POST["id"]);

$pago->estado = $_POST["pago"];
$fechaformat = new DateTime($_POST["fecha1"]);
$pago->fechainicio = $fechaformat->format('Y-m-d H:i:s');

$aux = $pago->update();


if ($aux[0] == 1) {

    core::alert("Modificacion Exitosa");

    core::redir("./?view=Pago/ViewPago");
} else {

    core::alert("Error al Modificar");

    core::redir("./?view=Pago/ViewPago");
}
