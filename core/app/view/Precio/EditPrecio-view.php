
<div class="col-md-12 col-lg-12">
    <div class="card mg-b-20">
        <div class="card-header">
            <h4 class="card-header-title">
            Precio a editar
            </h4>
            <div class="card-header-btn">
                <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse7" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
            </div>
        </div>
        <div class="card-body collapse show" id="collapse7">

            <?php $precio=PrecioData::getById($_POST["id"]); ?>

            <form class="needs-validation" action="index.php?action=Precio/EditPrecio" method="post" novalidate>
                <div class="form-row"> 

                    <!--info oculta-->
				    <input type="text" style="display: none" id="id" name="id" value="<?php echo $precio->id;?>" readonly="true"  required>

                  <div class="col-md-6 mb-3">
                    <label for="apellido">Nombre</label>
                    <input onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" id="nombre" name="nombre" placeholder="ingrese nombre" value="<?php echo $precio->nombre ?>" required>
                    <div class="valid-feedback">
                       nombre valido 
                    </div>
                    <div class="invalid-feedback">
                       Por favor ingrese un nombre 
                    </div>
                  </div>
                 
                  <div class="col-md-6 mb-3">
                    <label for="apellido">preico</label>
                    <input  type="text" class="form-control" id="precio" name="precio" placeholder="ingrese su nombre" value="<?php echo $precio->precio ?>" required>
                    <div class="valid-feedback">
                       precio valido 
                    </div>
                    <div class="invalid-feedback">
                       Por favor ingrese un nombre 
                    </div>
                  </div>

                </div>   
                <button class="btn btn-custom-primary" type="submit">Editar</button> 
            </form>
        </div>
    </div>
</div>