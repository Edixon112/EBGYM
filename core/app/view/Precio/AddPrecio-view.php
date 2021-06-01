<div class="col-md-12 col-lg-12">
    <div class="card mg-b-20">
        <div class="card-header">
            <h4 class="card-header-title">
                Registre Precios Manejados por el GIM
            </h4>
            <div class="card-header-btn">
                <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse7" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
            </div>
        </div>
        <div class="card-body collapse show" id="collapse7">
            <form class="needs-validation" action="index.php?action=Precio/AddPrecio" method="post" novalidate>
                <div class="form-row">

                    <!--info oculta-->
                    <!--input type="text" style="display: none" id="activo" name="activo" value="" readonly="true"  required /-->

                    <div class="col-md-6 mb-3">
                        <label for="precio">selecione tipo</label>
                        <select type="text" class="form-control" name="nombre" id="nombre" required>
                            <option value="MENSUAL">MENSUAL</option>
                            <option value="DIARIO" selected>DIARIO</option>
                        </select>
                        <div class="invalid-feedback">
                            Por favor selecione
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="precio">precio</label>
                        <input type="text" class="form-control" id="precio" name="precio" placeholder="Ingrese Precio" value="" required>
                        <div class="valid-feedback">
                            Monto valido
                        </div>
                        <div class="invalid-feedback">
                            Por favor ingrese un Monto
                        </div>
                    </div>


                </div>
                <button class="btn btn-custom-primary" type="submit">Enviar</button>
            </form>
        </div>
    </div>
</div>