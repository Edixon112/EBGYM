<div class="col-md-12 col-lg-12">
    <div class="card mg-b-20">
        <div class="card-header">
            <h4 class="card-header-title">
                Ingrese gastos y descropcion
            </h4>
            <div class="card-header-btn">
                <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse7" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
            </div>
        </div>
        <div class="card-body collapse show" id="collapse7">
            <form class="needs-validation" action="index.php?action=Administracion/AddGasto" method="post" novalidate>
                <div class="card-body collapse show" id="collapse4">
                    <div class="row">

                        <!--info oculta-->
                        <!--input type="text" style="display: none" id="id" name="id" value="" readonly="true" required / -->


                        <div class="col-md-4">

                            <label>Colocar Fecha Manual </label>
                            <div class="input-group mb-3">
                                <select onChange="cambios(this)" class="selectpicker form-control" data-hide-disabled="true" data-live-search="true" name="validacion" id="validacion" id="inputGroupSelect01" required>
                                    <option value="si"> si </option>
                                    <option value="no" selected> no </option>
                                </select>
                            </div>

                            <div class="input-group mb-3" id=fecha name=fecha style="display: none">
                                <label>Ingrese Fecha Manual </label>
                                <div class="input-group">
                                    <div class="input-group-prepend" class="accordion-icon fa fa-calendar-o">
                                    </div>
                                    <input autocomplete="off" type="text" id="fecha" name="fecha" class="form-control datepicker-here" placeholder="Ingrese fecha" data-timepicker="true" data-time-format="hh:ii ">
                                    <div class="invalid-feedback">
                                        por favor ingrese una fecha.
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4">

                            <label>Descripcion del gasto</label>
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese descripcion" value="" autocomplete="off" required>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <label>Ingrese monto </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control" id="gasto" name="gasto" value="" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>

                        </div>

                    </div>
                    <button class="btn btn-custom-primary" type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>