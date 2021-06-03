<?php

$persona=PersonaData::getById(intval($_POST["id"]));
$pago= PagoData::getByIdCliente($id)($persona->id);

echo $pago->fechainicio;

?>