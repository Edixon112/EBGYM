<?php

$pago = PagoData::getById($_POST["id"]);
$cliente = PersonaData::getById($pago->idcliente);
$plan = PlanData::getByIdCliente($cliente->id);
$precio = PrecioData::getbyId($plan->idprecio);

if ($pago->abono + intval($_POST["abono"]) == $precio->precio) {
    $pago->estado = 1;

    $pago->abono = $precio->precio;

    $aux = $pago->updateEstado();

    $abono = new AbonoData();

    $abono->idpago = $pago->id;
    $abono->monto = $_POST["abono"];
    $abono->fecha = date("Y-m-d H:i:s");
    $abono->idgym = $gym->id;
    $abono->add();
} else {

    $pago->estado = 2;

    $pago->abono = $pago->abono + intval($_POST["abono"]);


    $aux = $pago->updateEstado();

    $abono = new AbonoData();

    $abono->idpago = $pago->id;
    $abono->monto = $_POST["abono"];
    $abono->fecha = date("Y-m-d H:i:s");
    $abono->idgym=$gym->id;
    $abono->add();
}

if ($aux[0] == 1) {

    core::alert("Pago Exitoso");

    core::redir("./?view=Pago/ViewPagoMora");
} else {

    core::alert("Error al Pagar");

    core::redir("./?view=Pago/ViewPagoMora");
}
