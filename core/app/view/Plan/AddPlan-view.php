
<div class="col-md-12 col-lg-12">
    <div class="card mg-b-20">
        <div class="card-header">
            <h4 class="card-header-title">
            Registre su Menbrecia
            </h4>
            <div class="card-header-btn">
                <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse7" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
            </div>
        </div>
        <div class="card-body collapse show" id="collapse7">
            <form class="needs-validation" action="index.php?action=Plan/AddPlan" method="post" novalidate>
                <div class="form-row"> 

                    <!--info oculta-->
				        <!--input type="text" style="display: none" id="activo" name="activo" value="<?php //echo $activo=0;?>" readonly="true"  required /-->
                  
                    <div class="col-md-6 mb-3">
                    <label for="admin">Seleccione Cliente</label>
                        <div class="input-group mb-6">
                              <select class="selectpicker form-control" data-hide-disabled="true" data-live-search="true" name="cliente" id="cliente" id="inputGroupSelect01" required>
                                 <option > </option>
                                 <?php 

                                 
                                 $personas=Persona_GymData::getAll();
                                
                                    foreach ($personas as $personas) {
                                          
                                    $cliente=PersonaData::getById($personas->idpersona);
                                        if($cliente->rol==3){
                                            $plan=PlanData::getByIdCliente($cliente->id);
                                           if($plan==null){

                                           
                                 ?>                
                                 
                                 <option   value="<?php echo $cliente->id;?>" ><?php echo $cliente->nombre;?></option>
                                 <?php }
                                  }
                                 }?>               
                              </select>
                        </div>
                     </div>

                     <div class="col-md-6 mb-3">
                    <label for="admin">Seleccione Tipo de membresia</label>
                        <div class="input-group mb-6">
                              <select class="selectpicker form-control" data-hide-disabled="true" data-live-search="true" name="precio" id="precio" id="inputGroupSelect01" required>
                                 <option > </option>
                                 <?php 
                                    $precio=PrecioData::getAll();
                                    foreach ($precio as $precio) {
                                       
                                 ?>                
                                 <option   value="<?php echo $precio->id;?>" ><?php echo $precio->nombre;?></option>
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
