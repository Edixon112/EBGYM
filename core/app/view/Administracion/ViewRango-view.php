<?php
$fechainiciopost = $_POST["fechainicio"];

$fechafinpost = $_POST["fechafin"];


$fecha1 = date_format(date_create($fechainiciopost) , 'Y-m-d H:i:s');
$fecha2 = date_format(date_create($fechafinpost) , 'Y-m-d H:i:s');

$pago=PagoData::getFecha($fecha1,$fecha2);

?>

<!-- Scrollable Table Start -->
<div class="col-md-20 col-lg-20">
   <div class="card mg-b-12">
      <div class="card-header">
         <h4 class="card-header-title">
            Fechas selecionadas
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
                  </tr>
               </thead>
               <tbody>
                  <?php foreach($pago as $pago):
                        if (($pago) and ($pago->estado == 1)){
                        $persona = PersonaData::getById($pago->idcliente);
                        $membresia = PlanData::getByIdCliente($persona->id);
                        $precio = PrecioData::getById($membresia->idprecio);
                        ?>

                           <tr>
                              <td><?php echo $pago->id; ?></td>
                              <td><?php echo $persona->nombre; ?></td>
                              <td><?php echo $pago->fechainicio; ?></td>
                              <td><?php echo $precio->nombre; ?></td>
                              <td><?php if (($pago) and ($pago->estado == 1)) {
                                       echo '<a class="text-success">pagado</a>';
                                    } else {
                                       echo '<a class="text-danger">pendiente</a>';
                                    } ?></td>
                           </tr>

                         <?php } endforeach; ?> 

               </tbody>
               <tfoot class="thead-colored thead-primary">
                  <tr>
                     <th>ID</th>
                     <th>Nombre</th>
                     <th>Fecha de inicio</th>
                     <th>membresia</th>
                     <th>Pago</th>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
   </div>
</div>
