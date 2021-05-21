<?php $plans=PlanData::getAll(); ?>
<!-- Scrollable Table Start -->
<div class="col-md-12 col-lg-12">
   <div class="card mg-b-20">
      <div class="card-header">
         <h4 class="card-header-title">
          Tabla Plan
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
                     <th>Cliente</th>
                     <th>Precio</th>
                     <th>Opciones</th>
                  <th> </th>
               </tr>
            </thead>
            <tbody>
               <?php
                  foreach($plans as $plan):
               ?>
               <tr>
                  <td><?php echo $plan->id;  ?></td>
                  <td><?php echo $plan->idcliente; ?></td>
                  <td><?php echo $plan->idprecio; ?></td>
                  <td class="text-Center table-actions">
                     <div class="btn-group mg-t-5">  

                        <form action="index.php?view=Plan/EditPlan" method="post">   
                           <input type="hidden" name="id" value=<?php echo $plan->id;?>>
                           <input type="hidden" name="view" value=<?php echo $_GET["view"];?>>
                           <button class="btn btn-secondary" onclick="return pregunta()" ><a data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil"></i></a></button>
                        </form>

                        <form action="index.php?action=Plan/EliminarPlan" method="post">   
                           <input type="hidden" name="id" value=<?php echo $plan->id;?>>
                           <input type="hidden" name="view" value=<?php echo $_GET["view"];?>>
                           <button class="btn btn-secondary" onclick="return pregunta()" ><a data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-trash"></i></a></button>
                        </form>
                        
                     </div>
                  </td>
               </tr> 
               <?php 
                endforeach;
               ?>
            </tbody>
               <tfoot>
                  <tr>
                     <th>ID</th>
                     <th>Cliente</th>
                     <th>Precio</th>
                     <th>Opciones</th>
                     <th> </th>
                  </tr>
               </tfoot>
         </table>
      </div>
   </div>
</div>
<!--/ Scrollable Table End -->	