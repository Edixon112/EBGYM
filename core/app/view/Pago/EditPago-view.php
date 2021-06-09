<div class="col-md-12 col-lg-12">
    <div class="card mg-b-20">
        <div class="card-header">
            <h4 class="card-header-title">
                Modifique fecha y pago del cliente
            </h4>
            <div class="card-header-btn">
                <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse7" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
            </div>
        </div>
        <div class="card-body collapse show" id="collapse7">
            <form class="needs-validation" action="index.php?action=Pago/EditPago" method="post" novalidate>
                <div class="form-row">

                    <?php $pago = PagoData::getById($_POST["id"]);  ?>



                    <!--info oculta-->
                    <input type="text" style="display: none" id="id" name="id" value="<?php echo "$pago->id"; ?>" readonly="true" required>


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


                    <div class="col-md-4 mb-4">
                        <label for="cc">Ingrese fecha manual a modificar</label>
                        <div class="input-group">
                            <div class="input-group-prepend" class="accordion-icon fa fa-calendar-o">
                            </div>
                            <input autocomplete="off" type="text" id="fecha1" name="fecha1" class="form-control datepicker-here" placeholder="<?php echo "$pago->fechainicio" ?>" data-timepicker="true" data-time-format="hh:ii ">
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