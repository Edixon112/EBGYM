<?php

date_default_timezone_set("America/Bogota");

$asistencia=AsistenciaData::getById($_POST["id"]);

$asistencia->fechafin = date("Y-m-d H:i:s"); 


$aux=$asistencia->Out();

?>