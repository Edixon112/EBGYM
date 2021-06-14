<div class="col-md-12 col-lg-12">
   <div class="card mg-b-20">
      <div class="card-header">
         <h4 class="card-header-title">
            Registre Precios Manejados por el GIM / <a class="text-danger"> El Selector No Mostrara Nombres Que Ya Tengan El Precio Asignado </a>
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
                  <label for="admin">Seleccione Tipo de membresia</label>
                  <div class="input-group mb-6">
                     <select class="selectpicker form-control" data-hide-disabled="true" data-live-search="true" name="nombre" id="nombre" id="inputGroupSelect01" required>

                        <option value="DIARIO_5MIL">DIARIO_5MIL</option>
                        <option value="DIARIO_3MIL">DIARIO_3MIL</option>
                        <option value="DIARIO">DIARIO</option>
                        <option value="MENSUAL">MENSUAL </option>
                        <option value="MENSUAL_40MIL">MENSUAL_40MIL </option>
                        <option value="MENSUAL_35MIL">MENSUAL_35MIL </option>
                        <option value="15_DIAS">15_DIAS </option>

                     </select>
                  </div>
               </div>

               <div class="col-md-6 mb-3">
                  <label for="precio">Precio</label>
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

<?php $precios = PrecioData::getAll(); ?>
<!-- Scrollable Table Start -->
<div class="col-md-12 col-lg-12">
   <div class="card mg-b-20">
      <div class="card-header">
         <h4 class="card-header-title">
            Tabla Precio
         </h4>
         <div class="card-header-btn">
            <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse7" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
            <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
            <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
            <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
         </div>
      </div>
      <div class="card-body pd-0 collapse show">
         <table id="dtHorizontalVerticalExample" class="table table-responsive-sm" cellspacing="0" width="100%">
            <thead class="thead-colored thead-primary">
               <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>idgym</th>
                  <th>Opciones</th>
               </tr>
            </thead>
            <tbody>
               <?php

               foreach ($precios as $precio) :
               ?>
                  <tr>
                     <td><?php echo $precio->id;  ?></td>
                     <td><?php echo $precio->nombre; ?></td>
                     <td><?php echo $precio->precio; ?></td>
                     <td><?php echo $precio->idgym; ?></td>
                     <td class="text-Center table-actions">
                        <div class="btn-group mg-t-5">

                           <form action="index.php?view=Precio/EditPrecio" method="post">
                              <input type="hidden" name="id" value=<?php echo $precio->id; ?>>
                              <input type="hidden" name="view" value=<?php echo $_GET["view"]; ?>>
                              <button class="btn btn-secondary mg-r-5 mg-b-10" onclick="return pregunta()"><a data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil"></i></a></button>
                           </form>

                           <form action="index.php?action=Precio/EliminarPrecio" method="post">
                              <input type="hidden" name="id" value=<?php echo $precio->id; ?>>
                              <input type="hidden" name="view" value=<?php echo $_GET["view"]; ?>>
                              <button class="btn btn-secondary mg-r-5 mg-b-10" onclick="return pregunta()"><a data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-trash"></i></a></button>
                           </form>

                        </div>
                     </td>
                  </tr>
               <?php
               endforeach;
               ?>
            </tbody>
            <tfoot class="thead-colored thead-primary">
               <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>idgym</th>
                  <th>Opciones</th>
               </tr>
            </tfoot>
         </table>
      </div>
   </div>
</div>
<!--/ Scrollable Table End -->