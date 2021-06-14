<?php

$asistencia = AsistenciaData::delById($_POST["id"]);

core::redir("./?view=Asistencia/ViewAsistencia");
