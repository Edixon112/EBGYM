<?php

$asistencia = AsistenciaData::delById($_POST["id"]);

if ($direccion == 'Asistencia/ViewAsistencia') {

    core::redir("./?view=Asistencia/ViewAsistencia");
} else {

    core::redir("./?view=Asistencia/ViewSalidas");
}

