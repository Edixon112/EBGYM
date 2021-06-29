<?php
$user = UserData::getById($_SESSION["user_id"]);
$gym = GymData::getByIdUser($user->id);

//$abono = AbonoData::getByIdGym($gym->id);

$fechainiciopost = $_POST["fechainicio"];

$fechafinpost = $_POST["fechafin"];


$fecha1 = date_format(date_create($fechainiciopost), 'Y-m-d H:i:s');
$fecha2 = date_format(date_create($fechafinpost), 'Y-m-d H:i:s');

$abono = AbonoData::getFecha($fecha1, $fecha2);
$pago = PagoData::getFecha($fecha1, $fecha2);

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
                     <th>Precio</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($pago as $pago) :
                     if (($pago) and ($pago->estado == 1)) {
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
                           <td><?php echo $precio->precio; ?></td>
                        </tr>

                  <?php }
                  endforeach; ?>

               </tbody>
               <tfoot class="thead-colored thead-primary">
                  <tr>
                     <th>ID</th>
                     <th>Nombre</th>
                     <th>Fecha de inicio</th>
                     <th>membresia</th>
                     <th>Pago</th>
                     <th>precio</th>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
   </div>
</div>

<?php
$sumaTotal = 0;
foreach ($abono as $abono) {
   $abono->id;
   $abono->monto;
   $sumaTotal = ($sumaTotal) + ($abono->monto);
}
?>

<div class="alert alert-warning alert-bordered pd-y-15" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true"><i class="ico icon-close"></i></span>
   </button>
   <div class="d-sm-flex align-items-center justify-content-start">
      <i class="fa fa-money alert-icon tx-52 tx-warning mg-r-20"></i>
      <div class="mg-t-20 mg-sm-t-0">
         <h5 class="mg-b-2 tx-warning">Monto total de ingresos: <?php echo "$sumaTotal" ?> mil pesos</h5>
         <p class="mg-b-0 tx-gray"></p>
      </div>
   </div>
</div>