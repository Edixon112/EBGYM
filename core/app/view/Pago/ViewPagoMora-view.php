<?php $pagos = PagoData::getAllMora(); ?>
<!-- Scrollable Table Start -->
<div class="col-md-12 col-lg-12">
   <div class="card mg-b-20">
      <div class="card-header">
         <h4 class="card-header-title">
            Clientes en mora
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
                     <th>Abono</th>
                     <th>Debe</th>
                     <th>Opciones</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  foreach ($pagos as $pago) :
                     $cliente = PersonaData::getById($pago->idcliente);
                     $plan = PlanData::getByIdCliente($cliente->id);
                     $precio = PrecioData::getbyId($plan->idprecio);
                     $estado = $pago->estado;
                     if ($estado == 2) {
                  ?>
                        <tr>
                           <td class="text-dark"><?php echo $pago->id; ?></td>
                           <td class="text-dark"><?php echo $cliente->nombre; ?></td>
                           <td class="text-dark"><?php echo $pago->fechainicio; ?></td>
                           <td class="text-dark"><?php echo $pago->abono; ?></td>
                           <td class="text-danger"><?php echo $precio->precio - $pago->abono; ?></td>

                           <td class="text-Center table-actions">
                              <div class="btn-group ">

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

                                 <form action="index.php?action=Pago/CancelarMora" method="post">
                                    <input type="hidden" name="id" value=<?php echo $pago->id; ?>>
                                    <input type="hidden" name="view" value=<?php echo $_GET["view"]; ?>>
                                    <button class="btn btn-success mg-r-5 mg-b-10" onclick="return pregunta()"><a data-toggle="tooltip" data-placement="top" title="Pagar"><i class="fa fa-money"></i></a></button>
                                 </form>

                                 <form action="index.php?action=Pago/Abono" method="post">
                                    <input type="hidden" name="id" value=<?php echo $pago->id; ?>>
                                    <input type="hidden" name="view" value=<?php echo $_GET["view"]; ?>>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#m_modal_4"><a data-toggle="tooltip" data-placement="top" title="Abonar"><i class="fa fa-money"></i></a></button>


                                    <!--   ---------------------------            MODAL             ----------------------     -->
                                    <div class="modal" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel_4" aria-hidden="true">
                                       <div class="modal-dialog modal-lg" role="document">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel_4">Añadir Abono</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                                                </button>
                                             </div>
                                             <div class="modal-body">

                                                <!--   ---------------------------                         ----------------------     -->
                                                <div class="col-md-6 mb-4 " id="abono" name="abono">
                                                   <label for="">Ingrese Abono</label>
                                                   <div class="input-group">
                                                      <input type="text" class="form-control" id="abono" name="abono" placeholder="" value="">
                                                      <div class="valid-feedback">
                                                         abono valido
                                                      </div>
                                                      <div class="invalid-feedback">
                                                         Por favor ingrese un abono
                                                      </div>
                                                   </div>
                                                </div>


                                                <!--   ---------------------------                         ----------------------     -->

                                             </div>
                                             <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">ABONAR</button>
                                             </div>
                                          </div>
                                       </div>
                                    </div>

                                    <!--   ---------------------------          MODAL               ----------------------     -->
                                 </form>

                              </div>
                           </td>
                        </tr>
                  <?php
                     }
                  endforeach;
                  ?>
               </tbody>
               <tfoot class="thead-colored thead-primary">
                  <tr>
                     <th>ID</th>
                     <th>Cliente</th>
                     <th>Fecha De Inicio</th>
                     <th>Abono</th>
                     <th>Debe</th>
                     <th>Opciones</th>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
   </div>
</div>
<!--/ Scrollable Table End -->