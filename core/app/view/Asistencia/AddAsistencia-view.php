<div class="col-md-12 col-lg-12">
    <div class="card mg-b-20">
        <div class="card-header">
            <h4 class="card-header-title">
                Registre Datos de Asistencia
            </h4>
            <div class="card-header-btn">
                <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse7" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
            </div>
        </div>
        <div class="card-body collapse show" id="collapse7">
            <form class="needs-validation" action="index.php?action=Asistencia/AddAsistencia" method="post" novalidate>
                <div class="form-row">

                    <!--info oculta-->
                    <!--input type="text" style="display: none" id="activo" name="activo" value="<?php //echo $activo=0;?>" readonly="true"  required /-->

                    <div class="col-md-6 mb-3">
                        <p>selecione Cliente </p>
                        <div class="input-group mb-6">
                            <select onChange="cambios(this)" class="selectpicker form-control" data-hide-disabled="true" data-live-search="true" name="idcliente" id="idcliente" id="inputGroupSelect01" required>

                                <?php

                                $personas = Persona_GymData::getAll();

                                if ($personas != null) {


                                    foreach ($personas as $personas) {
                                        $persona = PersonaData::getById($personas->idpersona);
                                        if ($persona->rol == 3) {

                    
                                            $membresia = PlanData::getByIdCliente($persona->id);
                                            $disponible = AsistenciaData::getByIdClienteLibre($persona->id);
                                            $precio = PrecioData::getById($membresia->idprecio);

                                            if ($membresia != NULL && $disponible == null) {

                                                if ($precio->nombre == "MENSUAL") {

                                                    $pago = PagoData::getByIdCliente2($persona->id);

                                                    if ($pago) {


                                                        $ahora = date("Y-m-d H:i:s");

                                                        echo $fechaPAGO = $pago->fechainicio;
                                                        //sumo 1 mes
                                                        echo   $unmesdespues = date("d-m-Y", strtotime($fechaPAGO . "+ 1 month"));


                                                        $fecha_inicio = strtotime($pago->fechainicio);
                                                        $fecha_fin = strtotime($unmesdespues);
                                                        $fecha = strtotime($ahora);

                                                        if (($fecha >= $fecha_inicio) && ($fecha <= $fecha_fin)) {

                                ?>
                                                            <option  value="<?php echo $persona->id; ?>"><?php echo $persona->nombre . " - " . $precio->nombre; ?></option>

                                                    <?php
                                                        } else {
                                                            echo "fuera";
                                                        }
                                                    }
                                                } else {
                                                    ?>
                                                    <option  value="<?php echo $persona->id; ?>"><?php echo $persona->nombre . " - " . $precio->nombre;; ?></option>

                                <?php
                                                }
                                            }
                                        }
                                    }
                                } ?>

                            </select>
                        </div>
                    </div>


                    <div class="col-md-6 mb-3" id=pagos name=pagos>
                        <div class="col-md-4 mb-3">
                            <label for="">Pago</label>
                        </div>

                        <div class="col-md-4 mg-t-20 mg-lg-t-0">
                            <div class="custom-control custom-radio">
                                <input name="pago" type="radio" value="si">
                                <label>Si</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="custom-control custom-radio">
                                <input name="pago" checked="" type="radio" value="no">
                                <label>No</label>
                            </div>
                        </div>
                    </div>

                </div>
                <button class="btn btn-custom-primary" type="submit">Enviar</button>
            </form>
        </div>
    </div>
</div>

<script>
    function cambios(sel) {

        var parametros = {
            "id": sel.value

        };

        var tabla = $.ajax({
            url: './?action=Asistencia/Validacion',
            type: 'post',
            dataType: 'text',
            async: false,
            data: parametros
        }).responseText;


        var x = document.getElementById("pagos");

        if (tabla == "DIARIO" || tabla == "DIARIO_5MIL" || tabla == "DIARIO_3MIL" ) {

            x.style.display = "inline";

        } else {

            x.style.display = "none";

        }
        //document.getElementById("divprueba2").innerHTML = tabla;
    }
</script>