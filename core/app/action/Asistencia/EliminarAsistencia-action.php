<?php

$asistencia = AsistenciaData::delById($_POST["id"]);

$direccion = ($_POST["view"]);

if ($direccion == 'Asistencia/ViewAsistencia') {

    core::redir("./?view=Asistencia/ViewAsistencia");
} else {

    core::redir("./?view=Asistencia/ViewSalidas");
}

