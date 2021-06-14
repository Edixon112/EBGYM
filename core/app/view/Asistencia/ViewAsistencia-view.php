<?php $asistencias = AsistenciaData::getAll(); ?>
<!-- Scrollable Table Start -->
<div class="col-md-20 col-lg-20">
   <div class="card mg-b-12">
      <div class="card-header">
         <h4 class="card-header-title">
            Tabla De Clientes dentro del Gimnasio
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
                     <th>Nombre</th>
                     <th>Fecha de inicio</th>
                     <th>membresia</th>
                     <th>Pago</th>
                     <th>Acciones</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  if ($asistencias != null) {

                     foreach ($asistencias as $asistencia) :

                        $persona = PersonaData::getById($asistencia->idcliente);
                        $membresia = PlanData::getByIdCliente($persona->id);
                        $precio = PrecioData::getById($membresia->idprecio);
                        $pago = PagoData::getById($asistencia->idpago);

                        $fechatemp = new DateTime('0000-00-00 00:00:00');
                        $tiempo = $fechatemp->format('Y-m-d H:i:s');

                        $auxiliar = new DateTime($asistencia->fechafin);
                        $fechafin = $auxiliar->format('Y-m-d H:i:s');

                        if ($fechafin == $tiempo) {
                  ?>
                           <tr>
                              <td><?php echo $asistencia->id; ?></td>
                              <td><?php echo $persona->nombre; ?></td>
                              <td><?php echo $asistencia->fechainicio; ?></td>
                              <td><?php echo $precio->nombre; ?></td>
                              <td><?php if (($pago) and ($pago->estado == 1)) {
                                       echo '<a class="text-success">pagado</a>';
                                    } else {
                                       echo '<a class="text-danger">pendiente</a>';
                                    } ?></td>

                              <td class="text-Center table-actions">
                                 <div class="btn-group mg-t-5">

                                    <form action="index.php?view=Asistencia/EditAsistencia" method="post">
                                       <input type="hidden" name="id" value=<?php echo $asistencia->id; ?>>
                                       <input type="hidden" name="view" value=<?php echo $_GET["view"]; ?>>
                                       <button class="btn btn-secondary mg-r-5 mg-b-10" onclick="return pregunta()"><a data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil"></i></a></button>
                                    </form>

                                    <form action="index.php?action=Asistencia/EliminarAsistencia" method="post">
                                       <input type="hidden" name="id" value=<?php echo $asistencia->id; ?>>
                                       <input type="hidden" name="view" value=<?php echo $_GET["view"]; ?>>
                                       <button class="btn btn-secondary mg-r-5 mg-b-10" onclick="return pregunta()"><a data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-trash"></i></a></button>
                                    </form>

                                    <span class="btn btn-secondary dropdown-toggle mg-r-5 mg-b-10" data-toggle="dropdown"></span>

                                    <div class="dropdown-menu dropdown-menu-right">

                                       <?php if ($pago) { ?>

                                          <form action="index.php?action=Asistencia/OutAsistencia" method="post">
                                             <input type="hidden" name="id" value="<?php echo $asistencia->id;  ?>">
                                             <input type="hidden" name="view" value=<?php echo $_GET["view"]; ?>>
                                             <button class="dropdown-item"><i class="fa fa fa-sign-out"></i> SALIDA</button>
                                          </form>

                                       <?php } else { ?>

                                          <form action="index.php?view=Asistencia/EditAsistencia" method="post">
                                             <input type="hidden" name="id" value="<?php echo $asistencia->id;  ?>">
                                             <input type="hidden" name="view" value=<?php echo $_GET["view"]; ?>>
                                             <button class="dropdown-item"><i class="fa fa fa-sign-out"></i> pago</button>
                                          </form>
                  
                                       <?php } ?>
                                    </div>
                                 </div>
                              </td>
                           </tr>

                  <?php }
                     endforeach;
                  } ?>

               </tbody>
               <tfoot class="thead-colored thead-primary">
                  <tr>
                     <th>ID</th>
                     <th>Nombre</th>
                     <th>Fecha de inicio</th>
                     <th>membresia</th>
                     <th>Pago</th>
                     <th>Acciones </th>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
   </div>
</div>
<!--/ Scrollable Table End -->