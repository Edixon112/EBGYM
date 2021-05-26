
<div class="col-md-12 col-lg-12">
    <div class="card mg-b-20">
        <div class="card-header">
            <h4 class="card-header-title">
            Plan a editar
            </h4>
            <div class="card-header-btn">
                <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse7" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
            </div>
        </div>
        <div class="card-body collapse show" id="collapse7">

            <?php $plan=PlanData::getById($_POST["id"]); 
                  $persona=PersonaData::getById($plan->idcliente);?>

            <form class="needs-validation" action="index.php?action=Plan/EditPlan" method="post" novalidate>
                <div class="form-row"> 

                    <!--info oculta-->
				    <input type="text" style="display: none" id="id" name="id" value="<?php echo $plan->id;?>" readonly="true"  required>

                  <div class="col-md-6 mb-3">
                    <label for="apellido">nombre</label>
                    <input  type="text" class="form-control" id="idnombre" name="idnombre" placeholder="ingrese su nombre" value="<?php echo $persona->nombre ?>" readonly required>
                    <div class="valid-feedback">
                       nombre valido 
                    </div>
                    <div class="invalid-feedback">
                       Por favor ingrese un nombre 
                    </div>
                  </div>
                 
                  <div class="col-md-6 mb-3">
		               <label>selecione nuevo tipo de membrecia </label>
                     <div class="input-group mb-6 ">
                        <select class="selectpicker form-control" data-hide-disabled="true" data-live-search="true" name="idprecio" id="idprecio" id="inputGroupSelect01" required>
                           <option > </option>
                           <?php 
                              $precios=PrecioData::getAll();
                              foreach ($precios as $precio) {
                           ?>                
                           <option   value="<?php echo $precio->id;?>" ><?php echo $precio->nombre;?></option>
                           <?php } ?>               
                        </select>
                     </div>
                  </div>   

                </div>   
                <button class="btn btn-custom-primary" type="submit">Editar</button> 
            </form>
        </div>
    </div>
</div>