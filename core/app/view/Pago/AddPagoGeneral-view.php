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
            <form class="needs-validation" action="index.php?action=Pago/AddPagoGeneral" method="post" novalidate>
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

                                    if ($precio->nombre != "DIARIO" ) {

                                        $ahora = date("Y-m-d H:i:s");
                                        $fechaPAGO = $pago->fechainicio;
                                        $unmesdespues = date("Y-m-d H:i:s", strtotime($fechaPAGO . "+ 1 month"));

                                        $fecha_inicio = strtotime($pago->fechainicio);
                                        $fecha_fin = strtotime($unmesdespues);
                                        $fecha = strtotime($ahora);

                                        if($pago!=null){

                                        
                                ?>
                                            <option value="<?php echo $cliente->id; ?>"><?php echo $cliente->nombre ." ".$cliente->apellido." - ".$cliente->telefono." -> ".$precio->precio; ?></option>

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
                                <input onChange="cambios2(this)" name="pago" checked="" type="radio" value="1">
                                <label>Si</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="custom-control custom-radio">
                                <input onChange="cambios2(this)" name="pago"  type="radio" value="2">
                                <label>No</label>
                            </div>
                        </div>
                    </div>


                   
                    <div class="col-md-6 mb-4 " id="abono" name="abono" style="display: none" >
                        <label for="">Ingrese Abono</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="abono" name="abono" placeholder="" value="" onkeypress="return ValidacionNumero(event);" >
                            <div class="valid-feedback">
                                abono valido
                            </div>
                            <div class="invalid-feedback">
                                Por favor ingrese un abono
                            </div>
                        </div>
                    </div>
                    

                </div>
                <button class="btn btn-custom-primary " type="submit">Enviar Pago</button>
            </form>
        </div>
    </div>
</div>


