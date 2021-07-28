
<div class="col-md-12 col-lg-12">
    <div class="card mg-b-20">
        <div class="card-header">
            <h4 class="card-header-title">
            Edite sus Datos
            </h4>
            <div class="card-header-btn">
                <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse7" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
            </div>
        </div>
        <div class="card-body collapse show" id="collapse7">

            <?php $persona=PersonaData::getById($_POST["id"]); ?>

            <form class="needs-validation" action="index.php?action=Persona/EditPersona" method="post" novalidate>
                <div class="form-row"> 

                    <!--info oculta-->
				    <input type="text" style="display: none" id="id" name="id" value="<?php echo $persona->id;?>" readonly="true"  required>
                    
                    <div class="col-md-6 mb-3">
                       <label for="nombre">Nombre</label>
                       <input onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre" value="<?php echo $persona->nombre ?>"  onkeypress="return ValidacionLetra(event);" required>
                       <div class="valid-feedback">
                          Nombre valido
                       </div>
                       <div class="invalid-feedback">
                          Por favor ingrese un nombre 
                       </div>
                    </div>

                    <div class="col-md-6 mb-3">
                       <label for="apellido">Apellido</label>
                       <input onkeyup="javascript:this.value=this.value.toUpperCase();"  type="text" class="form-control" id="apellido" name="apellido"placeholder="ingrese su apellido" value="<?php echo $persona->apellido ?>"  onkeypress="return ValidacionLetra(event);" required>
                       <div class="valid-feedback">
                          Apellido valido
                       </div>
                       <div class="invalid-feedback">
                          Por favor ingrese un apellido 
                       </div>
                    </div>

                    <div class="col-md-6 mb-3">
                       <label for="apellido">Numero de Cedula</label>
                       <input  type="text"  disabled="" class="form-control" id="cedula" name="cedula"placeholder="ingrese su cedula" value="<?php echo $persona->cedula ?>"  onkeypress="return ValidacionNumero(event);" required>
                       <div class="valid-feedback">
                          Numero de cedula valido
                       </div>
                       <div class="invalid-feedback">
                          Por favor ingrese un numero cedula
                       </div>
                    </div>

                    <div class="col-md-6 mb-3">
                       <label for="apellido">telefono</label>
                       <input  type="text" class="form-control" id="telefono" name="telefono"placeholder="ingrese su telefono" value="<?php echo $persona->telefono ?>" onkeypress="return ValidacionNumero(event);" required>
                       <div class="valid-feedback">
                          Numero valido 
                       </div>
                       <div class="invalid-feedback">
                          Por favor ingrese un numero 
                       </div>
                    </div>

                </div>   
                <button class="btn btn-custom-primary" type="submit">Editar</button> 
            </form>
        </div>
    </div>
</div>