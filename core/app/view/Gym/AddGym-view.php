
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
            <form class="needs-validation" action="index.php?action=Gym/AddGym" method="post" novalidate>
                <div class="form-row"> 

                    <!--info oculta-->
				        <!--input type="text" style="display: none" id="activo" name="activo" value="<?php //echo $activo=0;?>" readonly="true"  required /-->
                    
                    <div class="col-md-6 mb-3">
                       <label for="nombre">Nombre</label>
                       <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre" value="" required>
                       <div class="valid-feedback">
                          Nombre valido
                       </div>
                       <div class="invalid-feedback">
                          Por favor ingrese un nombre 
                       </div>
                    </div>

                    <div class="col-md-6 mb-3">
                    <label for="admin">Seleccione Administrador</label>
                        <div class="input-group mb-6">
                              <select class="selectpicker form-control" data-hide-disabled="true" data-live-search="true" name="admin" id="admin" id="inputGroupSelect01" required>
                                 <option > </option>
                                 <?php 
                                    $user=UserData::getAll();
                                    foreach ($user as $user) {
                                        
                                        if($user->rol==2){
                                            $persona=PersonaData::getById($user->idpersona);
                                        
                                 ?>                
                                 <option   value="<?php echo $user->id;?>" ><?php echo $persona->nombre;?></option>
                                 <?php }} ?>               
                              </select>
                        </div>
                     </div>
                     
                </div>   
                <button class="btn btn-custom-primary" type="submit">Enviar</button> 
            </form>
        </div>
    </div>
</div>
