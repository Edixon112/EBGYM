<div class="col-md-12 col-lg-12">
    <div class="card mg-b-20">
        <div class="card-header">
            <h4 class="card-header-title">
                Ingresos del GYM
            </h4>
            <div class="card-header-btn">
                <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse7" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
            </div>
        </div>
        <div class="card-body collapse show" id="collapse7">
            <form class="needs-validation" action="index.php?view=Administracion/ViewRango" method="post" novalidate>
                <div class="form-row">


                    <div class="col-md-4 mb-4" id=fecha name=fecha>
                        <label for="cc">Ingrese Fecha inicio </label>
                        <div class="input-group">
                            <div class="input-group-prepend" class="accordion-icon fa fa-calendar-o">
                            </div>
                            <input onChange="cambios(this)" autocomplete="off" type="text" id="fechainicio" name="fechainicio" class="form-control datepicker-here" placeholder="Ingrese fecha" data-timepicker="true" data-time-format="hh:ii ">
                            <div class="invalid-feedback">
                                por favor ingrese una fecha.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4" id=fecha name=fecha>
                        <label for="cc">Ingrese Fecha fechafin </label>
                        <div class="input-group">
                            <div class="input-group-prepend" class="accordion-icon fa fa-calendar-o">
                            </div>
                            <input autocomplete="off" type="text" id="fechafin" name="fechafin" class="form-control datepicker-here" placeholder="Ingrese fecha" data-timepicker="true" data-time-format="hh:ii ">
                            <div class="invalid-feedback">
                                por favor ingrese una fecha.
                            </div>
                        </div>
                    </div>


                </div>
                <button class="btn btn-custom-primary" type="submit">Enviar</button>
            </form>
        </div>
    </div>
</div>