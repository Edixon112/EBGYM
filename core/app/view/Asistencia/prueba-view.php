<div class="col-md-6 mb-3">
    <p>selecione Cliente </p>
    <div class="input-group mb-6">
        <!-- ONCHANGE PASA LOS ACMBIOS A LA PRIMERA VARIABLE EN ESTE CASO CAMBIOS ES EL NOMBRE Y LA INFORMACION DE LOS CAMBIOS PASA A 
         (THIS) EN THIS SE REGISTRAN LOS CAMBIOS EN EL SELEC -->
        <select onChange="cambios(this)" class="selectpicker form-control" data-hide-disabled="true" data-live-search="true" name="idcliente" id="idcliente" id="inputGroupSelect01" required>
            <option> </option>
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

            ?>                           <!-- en este caso el value esta aca con el ide de la persona-->
                                        <option id="opcion" name="opcion" value="<?php echo $persona->id; ?>"><?php echo $persona->nombre . " - " . $precio->nombre; ?></option>

                                <?php
                                    } else {
                                        echo "fuera";
                                    }
                                }
                            } else {
                                ?>
                                <option id="opcion" name="opcion" value="<?php echo $persona->id; ?>"><?php echo $persona->nombre . " - " . $precio->nombre;; ?></option>

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



<script>
    //cambios es el nombre que esta pasando el onChange y en (sel) se esta pasando la accion en el select
    function cambios(sel) {



        // aca capturamos los cambios realizados en un capo especifico del select llamado value en este caso 
        // la variable parametros contiene esa informacion de value
        var parametros = {
            //sel llega desde cambios y pasa el valor afectado en value
            "id": sel.value

        };

        //$.ajax envia una informacion y recibe de la misma a la que envia 
        var tabla = $.ajax({
            //se coloca la direccion para enviar y recibir el resultado de esa informacion
            url: './?action=Asistencia/Validacion',
            //metodo para enviar la informacion en ete caso post
            type: 'post',
            //el tipo de dato en este caso text
            dataType: 'text',
            //no lo tengo claro 
            async: false,
            // referebcia a los parametros en el value 
            data: parametros
        }).responseText;
        //la variale toma el valor de 
        //getelementbyid toma lo que consiga con el nombre colocado en ("aqui"); entonces x es igual al div con ese nombre
        var x = document.getElementById("pagos");
        //tabla trae un valor dede el $.jax ese valor puede ser en este caso DIARIO O MENSUAL por la logia a donde envia
        if (tabla == "DIARIO") {
            //tomamos esa informacion y validamos si es corecta para mostrar solo los MENSUALES

            x.style.display = "inline";

        } else {

            x.style.display = "none";
        }


        //document.getElementById("divprueba2").innerHTML = tabla;

    }
</script>