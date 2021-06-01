<?php

date_default_timezone_set("America/Bogota");


$persona = Persona_GymData::getAll();
foreach ($persona as $key => $persona) :
    $cliente = PersonaData::getById($persona->idpersona);

    $pago = PagoData::getByIdCliente2($cliente->id);

    if ($pago) {


        $ahora = date("Y-m-d H:i:s");

        echo $fechaPAGO = $pago->fechainicio;
        //sumo 1 mes
        echo   $unmesdespues = date("d-m-Y", strtotime($fechaPAGO . "+ 1 month"));


        $fecha_inicio = strtotime($pago->fechainicio);
        $fecha_fin = strtotime($unmesdespues);
        $fecha = strtotime($ahora);

        if (($fecha >= $fecha_inicio) && ($fecha <= $fecha_fin)) {

            echo "entre";
        } else {

            echo "fuera";
        }
    }

endforeach;
