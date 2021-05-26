<?php    $users=UserData::getAll();    ?>
<!-- Scrollable Table Start -->
<div class="col-md-12 col-lg-12">
   <div class="card mg-b-20">
      <div class="card-header">
         <h4 class="card-header-title">
          Tabla User
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
                  <th>User</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Numero de Cedula</th>
                  <th>Numero de telefono</th>
                  <th>Gym</th>
                  <th>Rol</th>
                  <th> </th>
               </tr>
            </thead>
            <tbody>
               <?php  
                  foreach($users as $user):
                  $persona=PersonaData::getById($user->idpersona);
                  $rol=RolData::getById($user->rol);
                  $rolsu=$rol->id;
                  if($rolsu != 3 || $rolsu != 4  ){
               ?>
               <tr>
                  <td><?php echo $user->id;  ?></td>
                  <td><?php echo $user->user; ?></td>
                  <td><?php echo $persona->nombre; ?></td>
                  <td><?php echo $persona->apellido; ?></td>
                  <td><?php echo $persona->cedula; ?></td>
                  <td><?php echo $persona->telefono; ?></td>
                  <td><?php if($rolsu != 1 ){  
                              $gym=GymData::getByIdUser($user->id);
                              if($gym){
                              echo"$gym->nombre";
                              }else{
                                 echo"Falta gym a este ADM";
                              };
                           }else{
                              echo"";
                           };?></td>
                  <td><?php echo $rol->nombre; ?></td>
                  <td class="text-Center table-actions">
                     <div class="btn-group mg-t-5">  

                        <form action="index.php?view=User/EditUser" method="post">   
                           <input type="hidden" name="id" value=<?php echo $user->id;?>>
                           <input type="hidden" name="view" value=<?php echo $_GET["view"];?>>
                           <button class="btn btn-secondary" onclick="return pregunta()" ><a data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil"></i></a></button>
                        </form>

                        <form action="index.php?action=User/EliminarUser" method="post">   
                           <input type="hidden" name="id" value=<?php echo $user->id;?>>
                           <input type="hidden" name="view" value=<?php echo $_GET["view"];?>>
                           <button class="btn btn-secondary" onclick="return pregunta()" ><a data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-trash"></i></a></button>
                        </form>
                     </div>
                  </td>
               </tr> 
               <?php 
                  }
                endforeach;
               ?>
            </tbody>
               <tfoot>
                  <tr>
                     <th>ID</th>
                     <th>User</th>
                     <th>Nombre</th>
                     <th>Apellido</th>
                     <th>Numero de Cedula</th>
                     <th>Numero de telefono</th>
                     <th>Gym</th>
                     <th>Rol</th>
                     <th> </th>
                  </tr>
               </tfoot>
         </table>
      </div>
   </div>
</div>
<!--/ Scrollable Table End -->	