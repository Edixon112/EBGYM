<?php $personass=Persona_GymData::getAll(); ?>
<!-- Scrollable Table Start -->
<div class="col-md-12 col-lg-12">
   <div class="card mg-b-20">
      <div class="card-header">
         <h4 class="card-header-title">
          Tabla Admin
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
                  <th>Apellido</th>
                  <th>Numero de Cedula</th>
                  <th>Numero de telefono</th>
                  <th>Gym</th>
                  <th> </th>
               </tr>
            </thead>
            <tbody>
               <?php
                  foreach($personass as $personas):
                     $persona=PersonaData::getById($personas->idpersona);
                     $gym=GymData::getById($personas->idgym);
               ?>
               <tr>
                  <td><?php echo $persona->id;  ?></td>
                  <td><?php echo $persona->nombre; ?></td>
                  <td><?php echo $persona->apellido; ?></td>
                  <td><?php echo $persona->cedula; ?></td>
                  <td><?php echo $persona->telefono; ?></td>
                  <td><?php echo $gym->nombre; ?></td>
                  <td class="text-Center table-actions">
                     <div class="btn-group mg-t-5">  

                        <form action="index.php?view=Persona/EditPersona" method="post">   
                           <input type="hidden" name="id" value=<?php echo $persona->id;?>>
                           <input type="hidden" name="view" value=<?php echo $_GET["view"];?>>
                           <button class="btn btn-secondary mg-r-5 mg-b-10" onclick="return pregunta()" ><a data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil"></i></a></button>
                        </form>

                        <form action="index.php?action=Persona/EliminarPersona" method="post">   
                           <input type="hidden" name="id" value=<?php echo $persona->id;?>>
                           <input type="hidden" name="view" value=<?php echo $_GET["view"];?>>
                           <button class="btn btn-secondary mg-r-5 mg-b-10" onclick="return pregunta()" ><a data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-trash"></i></a></button>
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
                     <th>Apellido</th>
                     <th>Numero de Cedula</th>
                     <th>Numero de telefono</th>
                     <th>Gym</th>
                     <th> </th>
                  </tr>
               </tfoot>
         </table>
      </div>
   </div>
</div>
<!--/ Scrollable Table End -->