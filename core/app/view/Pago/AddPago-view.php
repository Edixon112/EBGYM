
<div class="col-md-12 col-lg-12">
    <div class="card mg-b-20">
        <div class="card-header">
            <h4 class="card-header-title">
            Registre pagos
            </h4>
            <div class="card-header-btn">
                <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse7" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
            </div>
        </div>
        <div class="card-body collapse show" id="collapse7">
            <form class="needs-validation" action="index.php?action=Pago/AddPago" method="post" novalidate>
                <div class="form-row"> 

                    <!--info oculta-->
				    <!--input type="text" style="display: none" id="activo" name="activo" value="<?php //echo $activo=0;?>" readonly="true"  required /-->
                  
                    <div class="col-md-6 mb-3">
                        <label for="admin">Seleccione cliente</label>
                        <div class="input-group mb-6">
                            <select class="selectpicker form-control" data-hide-disabled="true" data-live-search="true" name="idcliente" id="idcliente" id="inputGroupSelect01" required>
                                <option > </option>
                                <?php 
                                $cliente=PersonaData::getAll();
                                foreach ($cliente as $cliente) {
                                    if($cliente->rol==3){
                                    $plan=PlanData::getByIdCliente($cliente->id);     
                                ?>                
                               <option   value="<?php echo $cliente->id;?>" ><?php echo $cliente->nombre;?></option>
                               <?php  } } ?>               
                            </select>
                        </div>
                    </div>
                     
                </div>   
                <button class="btn btn-custom-primary" type="submit">Enviar</button> 
            </form>
        </div>
    </div>
</div>
