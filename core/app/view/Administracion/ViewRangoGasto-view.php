<?php
$user = UserData::getById($_SESSION["user_id"]);
$gym = GymData::getByIdUser($user->id);

//$abono = AbonoData::getByIdGym($gym->id);

$fechainiciopost = $_POST["fechainicio"];

$fechafinpost = $_POST["fechafin"];


$fecha1 = date_format(date_create($fechainiciopost), 'Y-m-d H:i:s');
$fecha2 = date_format(date_create($fechafinpost), 'Y-m-d H:i:s');

$abono = AbonoData::getFecha($fecha1, $fecha2);
$gasto = GastoData::getFecha($fecha1, $fecha2);

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
                     <th>Descipcion</th>
                     <th>Fecha de inicio</th>
                     <th>Gasto</th>
                  </tr>
               </thead>
               <tbody>

                  <?php
                  $sumaTotal = 0;
                  foreach ($gasto as $gasto) :
                     $sumaTotal = ($sumaTotal) + ($gasto->gasto);
                  ?>

                     <tr>
                        <td><?php echo $gasto->id; ?></td>
                        <td><?php echo $gasto->nombre; ?></td>
                        <td><?php echo $gasto->fecha; ?></td>
                        <td><?php echo $gasto->gasto; ?></td>
                     </tr>

                  <?php
                  endforeach; ?>

               </tbody>
               <tfoot class="thead-colored thead-primary">
                  <tr>
                     <th>ID</th>
                     <th>Descipcion</th>
                     <th>Fecha de inicio</th>
                     <th>Gasto</th>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
   </div>
</div>


<div class="alert alert-warning alert-bordered pd-y-15" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true"><i class="ico icon-close"></i></span>
   </button>
   <div class="d-sm-flex align-items-center justify-content-start">
      <i class="fa fa-money alert-icon tx-52 tx-warning mg-r-20"></i>
      <div class="mg-t-20 mg-sm-t-0">
         <h5 class="mg-b-2 tx-warning">Monto total de gastos: <?php echo $sumaTotal; ?> pesos</h5>
         <p class="mg-b-0 tx-gray"></p>
      </div>
   </div>
</div>

<?php


$sumaTotal1 = 0;
foreach ($abono as $abono) {
   $sumaTotal1 = ($sumaTotal1) + ($abono->monto);
}

$ganancia = ($sumaTotal1) - ($sumaTotal);
?>

<div class="alert alert-success alert-bordered pd-y-15" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true"><i class="ico icon-close"></i></span>
   </button>
   <div class="d-sm-flex align-items-center justify-content-start">
      <i class="fa fa-money alert-icon tx-52 mg-r-20 tx-success"></i>
      <div class="mg-t-20 mg-sm-t-0">
         <h5 class="mg-b-2 tx-success">Monto total de ingresos: <?php echo $sumaTotal1; ?> pesos</h5>
         <p class="mg-b-0 tx-gray"></p>
      </div>
   </div>
</div>

<div class="alert alert-success alert-bordered pd-y-15" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true"><i class="ico icon-close"></i></span>
   </button>
   <div class="d-sm-flex align-items-center justify-content-start">
      <i class="fa fa-money alert-icon tx-52 mg-r-20 tx-success"></i>
      <div class="mg-t-20 mg-sm-t-0">
         <h5 class="mg-b-2 tx-success">Ganancias : <?php echo $ganancia; ?> pesos</h5>
         <p class="mg-b-0 tx-gray"></p>
      </div>
   </div>
</div>
<div class="alert alert-success alert-bordered pd-y-15" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true"><i class="ico icon-close"></i></span>
   </button>
   <div class="d-sm-flex align-items-center justify-content-start">
      <i class="fa fa-money alert-icon tx-52 mg-r-20 tx-success"></i>
      <div class="mg-t-20 mg-sm-t-0">
         <h5 class="mg-b-2 tx-success">Enviar informacion por whatsapp</h5>

         <form class="needs-validation" action="index.php?action=Administracion/Mensaje" method="post" novalidate>

         <input type="text" style="display: none" id="fechainicio" name="fechainicio" value="<?php echo $fecha1;?>" readonly="true" required />
         <input type="text" style="display: none" id="fechafinal" name="fechafinal" value="<?php echo $fecha2;?>" readonly="true" required />
         <input type="text" style="display: none" id="ingresos" name="ingresos" value="<?php echo $sumaTotal1;?>" readonly="true" required />
         <input type="text" style="display: none" id="gastos" name="gastos" value="<?php echo $sumaTotal;?>" readonly="true" required />
         <input type="text" style="display: none" id="ganancias" name="ganancias" value="<?php echo $ganancia;?>" readonly="true" required />

      
         <button class="btn btn-custom-primary" type="submit">Enviar</button>
         </form>

      </div>
   </div>
   
</div>
