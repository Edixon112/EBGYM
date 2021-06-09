<?php $pagos = PagoData::getAll(); ?>
<!-- Scrollable Table Start -->
<div class="col-md-12 col-lg-12">
   <div class="card mg-b-20">
      <div class="card-header">
         <h4 class="card-header-title">
            Tabla pago
         </h4>
         <div class="card-header-btn">
            <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse7" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
            <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
            <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
            <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
         </div>
      </div>
      <div class="card-body pd-0 collapse show" id="productSalesDetails">
         <div class="table-responsive">
            <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
               <thead class="thead-colored thead-primary">
                  <tr>
                     <th>ID</th>
                     <th>Cliente</th>
                     <th>Fecha De Inicio</th>
                     <th>Estado Del Pago</th>
                     <th>Opciones</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  foreach ($pagos as $pago) :
                     $cliente = PersonaData::getById($pago->idcliente);
                  ?>
                     <tr>
                        <td><?php echo $pago->id; ?></td>
                        <td><?php echo $cliente->nombre; ?></td>
                        <td><?php echo $pago->fechainicio; ?></td>
                        <td><?php if ($pago->estado == 1) {
                                 echo '<a class="text-success">pagado</a>';
                              } else {
                                 if ($pago->estado == 2) {
                                    echo '<a class="text-danger">pendiente</a>';
                                 } else {
                                    echo "sin estado";
                                 }
                              } ?></td>
                        <td class="text-Center table-actions">
                           <div class="btn-group mg-t-5">

                              <form action="index.php?view=Pago/EditPago" method="post">
                                 <input type="hidden" name="id" value=<?php echo $pago->id; ?>>
                                 <input type="hidden" name="view" value=<?php echo $_GET["view"]; ?>>
                                 <button class="btn btn-secondary mg-r-5 mg-b-10" onclick="return pregunta()"><a data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil"></i></a></button>
                              </form>

                              <form action="index.php?action=Pago/EliminarPago" method="post">
                                 <input type="hidden" name="id" value=<?php echo $pago->id; ?>>
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
                     <th>Cliente</th>
                     <th>Fecha De Inicio</th>
                     <th>Estado Del Pago</th>
                     <th>Opciones</th>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
   </div>
</div>   
   <!--/ Scrollable Table End -->