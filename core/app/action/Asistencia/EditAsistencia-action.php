<?php

$asistencia = AsistenciaData::getById($_POST["id"]);

$fechaformat = new DateTime($_POST["fecha1"]);
$asistencia->fechainicio = $fechaformat->format('Y-m-d H:i:s');

$aux = $asistencia->updateFechainicio();


if ($aux[0] == 1) {

    core::alert("Modificacion Exitosa");

   // core::redir("./?view=Asistencia/ViewAsistencia");
} else {

    core::alert("Error al Modificar");

   // core::redir("./?view=Asistencia/ViewAsistencia");
}

?>