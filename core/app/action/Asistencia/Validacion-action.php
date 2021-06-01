<?php

$persona=PersonaData::getById(intval($_POST["id"]));
$membresia= PlanData::getByIdCliente($persona->id);
$precio = PrecioData::getById($membresia->idprecio);

echo $precio->nombre;

?>