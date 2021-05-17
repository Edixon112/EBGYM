
<div class="col-md-12 col-lg-12">
    <div class="card mg-b-20">
        <div class="card-header">
            <h4 class="card-header-title">
            Datos a modificar
            </h4>
            <div class="card-header-btn">
                <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse7" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
            </div>
        </div>
        <div class="card-body collapse show" id="collapse7">

            <?php $admin = AdminData::getById($_POST["id"]);?>

            <form class="needs-validation" action="index.php?action=???" method="post" novalidate>
                <div class="form-row"> 

					<!--info oculta-->
					<input type="text" style="display: none" name="id" id="id" value="<?php echo $admin->id;?>" readonly="true"  required />

                    <div class="col-md-6 mb-3">
                       <label for="nombre">Nombre</label>
                       <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $admin->nombre; ?>" placeholder="Ingrese su nombre" value="" required>
                       <div class="valid-feedback">
                          Nombre valido
                       </div>
                       <div class="invalid-feedback">
                          Por favor ingrese un nombre 
                       </div>
                    </div>
                    <div class="col-md-6 mb-3">
                       <label for="apellido">Apellido</label>
                       <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $admin->pellido; ?>" placeholder="ingrese su apellido" required>
                       <div class="valid-feedback">
                          Apellido valido
                       </div>
                       <div class="invalid-feedback">
                          Por favor ingrese un apellido 
                       </div>
                    </div>
                    <div class="col-md-6 mb-3">
                       <label for="apellido">Numero de Cedula</label>
                       <input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo $admin->pellido; ?>" placeholder="ingrese su cedula" required>
                       <div class="valid-feedback">
                          Numero de cedula valido
                       </div>
                       <div class="invalid-feedback">
                          Por favor ingrese un numero cedula
                       </div>
                    </div>
                    <div class="col-md-6 mb-3">
                       <label for="apellido">telefono</label>
                       <input  type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $admin->telefono; ?>" placeholder="ingrese su telefono"  required>
                       <div class="valid-feedback">
                          Numero valido 
                       </div>
                       <div class="invalid-feedback">
                          Por favor ingrese un numero 
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
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom01">selecione tipo</label>
                            <select type="text" class="form-control" name="tipo" id="tipo" required>
                                <option value="1">tipo1</option>
                                <option value="0" selected>tipo0</option>
                            </select>
                        </div>
                    </div>       
                </div>   
                <button class="btn btn-custom-primary" type="submit">Modificar</button> 
            </form>
        </div>
    </div>
</div>
