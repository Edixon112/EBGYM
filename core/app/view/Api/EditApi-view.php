<div class="col-md-12 col-lg-12">
    <div class="card mg-b-20">
        <div class="card-header">
            <h4 class="card-header-title">
                Ingrese Api
            </h4>
            <div class="card-header-btn">
                <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse7" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
            </div>
        </div>
        <div class="card-body collapse show" id="collapse7">
            <form class="needs-validation" action="index.php?action=Api/EditApi" method="post" novalidate>

                <?php $api = ApiData::getById($_POST["id"]);  ?>

                <div class="form-row">

                    <!--info oculta-->
                    <!--input type="text" style="display: none" id="activo" name="activo" value="<?php //echo $activo=0;
                                                                                                    ?>" readonly="true"  required /-->

                    <div class="col-md-6 mb-3">
                        <label for="token">Token</label>
                        <input type="text" class="form-control" id="token" name="token" placeholder="Ingrese su token" value="<?php echo $api->token ?>" required>
                        <div class="valid-feedback">
                            Token valido
                        </div>
                        <div class="invalid-feedback">
                            Por favor ingrese Token
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="instanceid">Instanceid</label>
                        <input type="text" class="form-control" id="instanceid" name="instanceid" placeholder="Ingrese su instanceid" value="<?php echo $api->instanceid ?>" required>
                        <div class="valid-feedback">
                            Instanceid valido
                        </div>
                        <div class="invalid-feedback">
                            Por favor ingrese Instanceid
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su telefono" value="<?php echo $api->telefono ?>" required>
                        <div class="valid-feedback">
                            Telefono valido
                        </div>
                        <div class="invalid-feedback">
                            Por favor ingrese Telefono
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="idempresa">Seleccione Empresa</label>
                        <div class="input-group mb-6">
                            <select class="selectpicker form-control" data-hide-disabled="true" data-live-search="true" name="idgym" id="idgym" id="inputGroupSelect01" required>
                                <option> </option>
                                <?php
                                $gym = GymData::getAll();
                                foreach ($gym as $gym) {
                                    $api = ApiData::getById($gym->id);
                                    if ($api == null) {
                                ?>
                                        <option value="<?php echo $gym->id; ?>"><?php echo "$gym->nombre"; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>

                </div>
                <button class="btn btn-custom-primary" type="submit">Enviar</button>
            </form>
        </div>
    </div>
</div>