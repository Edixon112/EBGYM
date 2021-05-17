
<div class="col-md-12 col-lg-12">
    <div class="card mg-b-20">
        <div class="card-header">
            <h4 class="card-header-title">
            Registre sus Datos
            </h4>
            <div class="card-header-btn">
                <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse7" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
            </div>
        </div>
        <div class="card-body collapse show" id="collapse7">

            <?php $api = ApiData::getById($_POST["id"]);?>

            <form class="needs-validation" action="index.php?action=???" method="post" novalidate>

                <!--info oculta-->
                <input type="text" style="display: none" name="id" id="id" value="<?php echo $api->id;?>" readonly="true"  required />                    <div class="col-md-6 mb-3">

                <div class="form-row"> 
                   <label for="token">Ingrese token</label>
                   <input type="text" class="form-control" id="token" name="token" placeholder="Ingrese su token" value="<?php echo $api->token;?>" required>
                   <div class="valid-feedback">
                      token valido
                   </div>
                   <div class="invalid-feedback">
                      Por favor ingrese un token
                   </div>
                </div>
                    <div class="col-md-6 mb-3">
                       <label for="idinstance">idinstance</label>
                       <input type="text" class="form-control" id="idinstance" name="idinstance"placeholder="ingrese su idinstance" value="<?php echo $api->idinstance;?>" required>
                       <div class="valid-feedback">
                          idinstance valido
                       </div>
                       <div class="invalid-feedback">
                          Por favor ingrese un idinstance 
                       </div>
                    </div>
                    <div class="col-md-6 mb-3">
                       <label for="telefono">Numero de Telefono</label>
                       <input type="text" class="form-control" id="telefono" name="telefono"placeholder="ingrese su telefono" value="<?php echo $api->telefono;?>" required>
                       <div class="valid-feedback">
                          Numero de cedula valido
                       </div>
                       <div class="invalid-feedback">
                          Por favor ingrese un numero cedula
                       </div>
                    </div>

                    <div class="col-md-6 mb-3">
		                <p>selecione gym</p>
		                <div class="input-group mb-6">
                            <select class="selectpicker form-control" data-hide-disabled="true" data-live-search="true" name="idgym" id="idgym" id="inputGroupSelect01" required>
                                <option > </option>
                                <?php 
                                   $gyms=GymData::getAll();
                                   foreach ($gyms as $gym) {
                                ?>                
                                <option   value="<?php echo $gym->id;?>" ><?php echo $gym->nombre;?></option>
                                <?php } ?>               
                            </select>
		            	</div>
		            </div>
   
                </div>   
                <button class="btn btn-custom-primary" type="submit">Enviar</button> 
            </form>
        </div>
    </div>
</div>