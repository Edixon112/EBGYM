<?php $asistencias=AsistenciaData::getAll(); ?>
<!-- Scrollable Table Start -->
<div class="col-md-12 col-lg-12">
   <div class="card mg-b-20">
      <div class="card-header">
         <h4 class="card-header-title">
          Tabla Asistencia
         </h4>
         <div class="card-header-btn">
            <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse7" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
            <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
            <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
            <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
         </div>
      </div>
      <div class="table-responsive">
         <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
            <thead class="tx-dark tx-uppercase tx-10 tx-bold">
               <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Fecha de inicio</th>
                  <th>Fecha de salida</th>
                  <th>membresia</th>
                  <th>Pago</th>
                  <th>Acciones</th>
               </tr>
            </thead>
            <tbody>
               <?php
               if($asistencias!=null){

                  foreach($asistencias as $asistencia):

                  $persona=PersonaData::getById($asistencia->idcliente);
                  $membresia=PlanData::getByIdCliente($persona->id);
                  $precio=PrecioData::getById($membresia->idprecio);
                  $pago=PagoData::getById($asistencia->idpago);
               ?>
               <tr>
                  <td><?php echo $asistencia->id; ?></td>
                  <td><?php echo $persona->nombre; ?></td>
                  <td><?php echo $asistencia->fechainicio; ?></td>
                  <td><?php echo $asistencia->fechafin; ?></td>
                  <td><?php echo $precio->nombre;?></td>
                  <td><?php if($pago){echo "Pagado";}else echo "Pendiente"; ?></td>

                  <td class="text-Center table-actions">
                     <div class="btn-group mg-t-5">  

                        <form action="index.php?view=Asistencia/EditAsistencia" method="post">   
                           <input type="hidden" name="id" value=<?php echo $asistencia->id;?>>
                           <input type="hidden" name="view" value=<?php echo $_GET["view"];?>>
                           <button class="btn btn-secondary" onclick="return pregunta()" ><a data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil"></i></a></button>
                        </form>

                        <form action="index.php?action=Asistencia/EliminarAsistencia" method="post">   
                           <input type="hidden" name="id" value=<?php echo $asistencia->id;?>>
                           <input type="hidden" name="view" value=<?php echo $_GET["view"];?>>
                           <button class="btn btn-secondary" onclick="return pregunta()" ><a data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-trash"></i></a></button>
                        </form>

                        <span class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"></span>

                        <div class="dropdown-menu dropdown-menu-right">
                           
                            <?php if($pago){ ?>    
                           <form action="index.php?action=Asistencia/OutAsistencia" method="post">
                                 <input type="hidden" name="id" value="<?php echo $asistencia->id;  ?>">
                                 <input type="hidden" name="view" value=<?php echo $_GET["view"];?>>
                                 <button class="dropdown-item" ><i class="fa fa-cogs"></i> SALIDA</button>  
                           </form>
                             <?php }else{?>

                           <form action="index.php?action=Pago/AddPago" method="post">
                               <input type="hidden" name="id" value="<?php echo $asistencia->idcliente;  ?>">
                               <input type="hidden" name="view" value=<?php echo $_GET["view"];?>>
                               <button class="dropdown-item" ><i class="fa fa-cogs"></i> PAGO</button>  
                           </form>
                           <?php }?>
                        </div>                             
                     </div>
                  </td>
               </tr> 

               <?php      endforeach; } ?>

            </tbody>
               <tfoot>
                  <tr>
                     <th>ID</th>
                     <th>Nombre</th>
                     <th>Fecha de inicio</th>
                     <th>Fecha de salida</th>
                     <th>membresia</th>
                     <th>Pago</th>
                     <th>Acciones </th>
                  </tr>
               </tfoot>
         </table>
      </div>
   </div>
</div>
<!--/ Scrollable Table End -->	