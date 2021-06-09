<div class="col-md-12 col-lg-12">
    <div class="card mg-b-20">
        <div class="card-header">
            <h4 class="card-header-title">
                Registre pagos
            </h4>
            <div class="card-header-btn">
                <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse7" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
            </div>
        </div>
        <div class="card-body collapse show" id="collapse7">
            <form class="needs-validation" action="index.php?action=Pago/AddPagoMensual" method="post" novalidate>
                <div class="form-row">

                    <!--info oculta-->
                    <!--input type="text" style="display: none" id="activo" name="activo" value="
                    <?php //echo $activo=0;
                    ?>" readonly="true"  required /-->

                    <div class="col-md-5 mb-3">
                        <label for="admin">Seleccione cliente</label>
                        <div class="input-group mb-6">
                            <select class="selectpicker form-control" data-hide-disabled="true" data-live-search="true" name="idcliente" id="idcliente" id="inputGroupSelect01" required>


                                <?php

                                date_default_timezone_set("America/Bogota");


                                $persona = Persona_GymData::getAll();
                                foreach ($persona as $key => $persona) :
                                    $cliente = PersonaData::getById($persona->idpersona);

                                    $pago = PagoData::getByIdCliente2($cliente->id);

                                    $membresia = PlanData::getByIdCliente($cliente->id);
                                    $precio = PrecioData::getById($membresia->idprecio);

                                    if ($precio->nombre != "DIARIO" XOR $precio->nombre != "DIARIO_3MIL" XOR $precio->nombre != "DIARIO_5MIL" ) {

                                        $ahora = date("Y-m-d H:i:s");
                                        $fechaPAGO = $pago->fechainicio;
                                        $unmesdespues = date("d-m-Y", strtotime($fechaPAGO . "+ 1 month"));

                                        $fecha_inicio = strtotime($pago->fechainicio);
                                        $fecha_fin = strtotime($unmesdespues);
                                        $fecha = strtotime($ahora);

                                        if ($pago == null || ($fecha >= $fecha_fin)) {
                                ?>
                                            <option value="<?php echo $cliente->id; ?>"><?php echo $cliente->nombre ?></option>

                                <?php
                                        }
                                    }
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>



                    <div class="col-md-6 mb-1">
                        <div class="col-md-2 mb-2">
                            <label for="">Pago</label>
                        </div>

                        <div class="col-md-2 mg-t-3 mg-lg-t-0">
                            <div class="custom-control custom-radio">
                                <input name="pago" type="radio" value="1">
                                <label>Si</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="custom-control custom-radio">
                                <input name="pago" checked="" type="radio" value="2">
                                <label>No</label>
                            </div>
                        </div>

                    </div>


                    <div class="col-md-5 mb-2 ">
                        <div class="col-md-5 mb-2">
                            <label for="">Colocar Fecha Manual <a class="text-danger"> Maximo un mes antes </a> </label>
                        </div>

                        <div class="col-md-5">
                            <select onChange="cambios(this)" class="selectpicker form-control" data-hide-disabled="true" data-live-search="true" name="validacion" id="validacion" id="inputGroupSelect01" required>
                                <option value="si"> si </option>
                                <option value="no"> no </option>
                            </select>
                        </div>

                    </div>


                    <div class="col-md-4 mb-4" id=fecha name=fecha>
                        <label for="cc">Ingrese Fecha Manual </label>
                        <div class="input-group">
                            <div class="input-group-prepend" class="accordion-icon fa fa-calendar-o">
                            </div>
                            <input autocomplete="off" type="text" id="fecha1" name="fecha1" class="form-control datepicker-here" placeholder="Ingrese fecha" data-timepicker="true" data-time-format="hh:ii ">
                            <div class="invalid-feedback">
                                por favor ingrese una fecha.
                            </div>
                        </div>
                    </div>

                    

                </div>
                <button class="btn btn-custom-primary " type="submit">Enviar Pago</button>
            </form>
        </div>
    </div>
</div>



<script>
    function cambios(sel) {
        /*
                var tabla = $.ajax({
                    url: './?action=Asistencia/Validacion',
                    type: 'post',
                    dataType: 'text',
                    async: false,
                    data: parametros
                }).responseText;
        */

        var x = document.getElementById("fecha");

        if (sel.value == "si") {

            x.style.display = "inline";

        } else {

            x.style.display = "none";

        }
        //document.getElementById("divprueba2").innerHTML = tabla;
    }
</script>