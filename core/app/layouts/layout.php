<!DOCTYPE html>  
<html>  
<head>   <title>auto lavado</title>  
</head>  
<body>  
<!DOCTYPE html>
<html lang="zxx">
   
<!-- Mirrored from colorlib.net/metrical/light/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Jan 2020 21:19:24 GMT -->
<head>
      <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="keyword" content="">
      <meta name="author"  content=""/>
      <!-- Page Title -->
      <title>DataTable | Metrical - Multipurpose Admin Dashboard Template</title>
      <!-- Main CSS -->			
      <link type="text/css" rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css"/>
      <link type="text/css" rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css"/>
      <link type="text/css" rel="stylesheet" href="assets/plugins/flag-icon/flag-icon.min.css"/>
      <link type="text/css" rel="stylesheet" href="assets/plugins/simple-line-icons/css/simple-line-icons.css">
      <link type="text/css" rel="stylesheet" href="assets/plugins/ionicons/css/ionicons.css">
      <link type="text/css" rel="stylesheet" href="assets/plugins/jquery-ui/jquery-ui.css">
      <link type="text/css" rel="stylesheet" href="assets/plugins/datatables/jquery.dataTables.min.css">
      <link type="text/css" rel="stylesheet" href="assets/plugins/datatables/extensions/dataTables.jqueryui.min.css">
      <link type="text/css" rel="stylesheet" href="assets/css/app.min.css"/>
      <link type="text/css" rel="stylesheet" href="assets/css/style.min.css"/>
      <link type="text/css" rel="stylesheet" href="assets/plugins/bootstrap-select/css/bootstrap-select.min.css">

      <link type="text/css" rel="stylesheet" href="assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css"><!-- boos de tiempo xd-->
      <link type="text/css" rel="stylesheet" href="assets/plugins/datepicker/css/datepicker.min.css"><!-- este tiempo-->
      
      <!-- Favicon -->	
      <link rel="icon" href="assets/images/EB.jpeg" type="image/x-icon">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn"t work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
   <?php 
                    if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])){

                    //SI SE LOGRA EL INICIO DE SESION SE MUESTRA LA PAGINA //  EN SU DEFECTO SE MUESTRA EL INICIO DE SESION 



                  ?>
                          <?php
                          $user = UserData::getById($_SESSION["user_id"]);

                         
                             
                           ?>
      <!--================================-->
      <!-- Page Container Start -->
      <!--================================-->
      <div class="page-container">
         <!--================================-->
         <!-- Page Sidebar Start -->
         <!--================================-->
         <div class="page-sidebar">
            <div class="logo">
               <a class="logo-img" href="index.php?">		
               <img class="desktop-logo" src="assets/images/LOGOEB.jpeg" alt="">
               <img class="small-logo" src="assets/images/EB.jpeg" alt="">
               </a>			
               <i class="ion-ios-close-empty" id="sidebar-toggle-button-close"></i>
            </div>
            <!--================================-->
            <!-- Sidebar Menu Start -->
            <!--================================-->
            <div class="page-sidebar-inner">
               <div class="page-sidebar-menu">
                  <ul class="accordion-menu">
                     <li>
                        <li> 
                           <a href="#"><i data-feather="user-check"></i>
                           <span>Admin</span><i class="accordion-icon fa fa-angle-left"></i></a>
                           <ul class="sub-menu">
                              <li><a href="index.php?view=User/Mci_View_User">Ver ADMIN</a></li>
                              <li><a href="index.php?view=User/Mci_Add_User">Ingresar ADMIN</a></li>
                           </ul>
                        </li>
                        <li> 
                           <a href="#"><i data-feather="user"></i>
                           <span>Cliente</span><i class="accordion-icon fa fa-angle-left"></i></a>
                           <ul class="sub-menu">
                              <li><a href="index.php?view=Cliente/AddCliente">Añadir cliente ADMIN</a></li>
                              <li><a href="index.php?view=Cliente/ViewCliente">Ver cliente ADMIN</a></li>
                              <li><a href="index.php?view=User/UserAddCliente">Ingresar cliente USER</a></li>
                           </ul>
                        </li>
                        <li> 
                           <a href="#"><i data-feather="calendar"></i>
                           <span>Cita</span><i class="accordion-icon fa fa-angle-left"></i></a>
                           <ul class="sub-menu">
                              <li><a href="index.php?view=Cita/AdminViewCita">Ver Pedido Cliente ADMIN</a></li>
                              <li><a href="index.php?view=Cita/UserCita">Ingresar Cita USER</a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="#"><i data-feather="cloud-drizzle"></i>
                           <span>Lavado</span><i class="accordion-icon fa fa-angle-left"></i></a>
                           <ul class="sub-menu">
                              <li><a href="index.php?view=Lavado/AddLavado">Añadir lavado ADMIN</a></li>
                              <li><a href="index.php?view=Lavado/ViewLavado">Ver lavado ADMIN</a></li>
                              <li><a href="index.php?view=Lavado/ViewCalendario">Ver calendario ADMIN</a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="#"><i data-feather="truck"></i>
                           <span>Vehiculo</span><i class="accordion-icon fa fa-angle-left"></i></a>
                           <ul class="sub-menu">
                              <li><a href="index.php?view=Vehiculo/AddVehiculo">Añadir vehiculo</a></li>
                              <li><a href="index.php?view=Vehiculo/ViewVehiculo">Ver vehiculo</a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="#"><i data-feather="list"></i>
                           <span>Tipo De Vehiculo</span><i class="accordion-icon fa fa-angle-left"></i></a>
                           <ul class="sub-menu">
                                <li><a href="index.php?view=Tipo/AddTipo">Añadir tipo ADMIN</a></li>
                                <li><a href="index.php?view=Tipo/ViewTipo">Ver tipo ADMIN</a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="#"><i data-feather="tag"></i>
                           <span>Precio</span><i class="accordion-icon fa fa-angle-left"></i></a>
                           <ul class="sub-menu">
                                <li><a href="index.php?view=Precio/AddPrecio">Añadir precio ADMIN</a></li>
                                <li><a href="index.php?view=Precio/ViewPrecio">Ver precio ADMIN</a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="#"><i data-feather="file"></i>
                           <span>Factura</span><i class="accordion-icon fa fa-angle-left"></i></a>
                           <ul class="sub-menu">
                              <li><a href="index.php?view=ViewFactura">Ver Factura ADMIN</a></li>
                           </ul>
                        </li>
                     </li>
                  </ul>
               </div>
            </div>
            <!--/ Sidebar Menu End -->
            <!--================================-->
            <!-- Sidebar Footer Start -->
            <!--================================-->
            <div class="sidebar-footer">									
               <a class="pull-left offset-md-6" href="index.php?view=User/Mci_View_User-view" data-toggle="tooltip" data-placement="top" data-original-title="Profile">
               <i data-feather="user" class="ht-15"></i></a>									
               <a class="pull-left" href="./logout.php" data-toggle="tooltip" data-placement="top" data-original-title="Sing Out">
               <i data-feather="log-out" class="ht-15"></i></a>
            </div>
            <!--/ Sidebar Footer End -->
         </div>
         <!--/ Page Sidebar End -->
         <!--================================-->
         <!-- Page Content Start -->
         <!--================================-->
         <div class="page-content">
            <!--================================-->
            <!-- Page Header Start -->
            <!--================================-->
            <div class="page-header">
               <div class="search-form">
                  <form action="#" method="GET">
                     <div class="input-group">
                        <input class="form-control search-input" name="search" placeholder="Type something..." type="text"/>
                        <span class="input-group-btn">
                        <span id="close-search"><i class="ion-ios-close-empty"></i></span>
                        </span>
                     </div>
                  </form>
               </div>
               <!--================================-->
               <!-- Page Header  Start -->
               <!--================================-->
               <nav class="navbar navbar-expand-lg">
                  <ul class="list-inline list-unstyled mg-r-20">
                     <!-- Mobile Toggle and Logo -->
                     <li class="list-inline-item align-text-top"><a class="hidden-md hidden-lg" href="#" id="sidebar-toggle-button"><i class="ion-navicon tx-20"></i></a></li>
                     <!-- PC Toggle and Logo -->
                     <li class="list-inline-item align-text-top"><a class="hidden-xs hidden-sm" href="#" id="collapsed-sidebar-toggle-button"><i class="ion-navicon tx-20"></i></a></li>
                  </ul>
                  <!--================================-->
                  <!-- Mega Menu Start -->
                  <!--================================-->
                  <div class="collapse navbar-collapse">
                     <ul class="navbar-nav mr-auto">
                        <!-- Features -->
                        
                        <!-- Technology -->
                       
                        <!-- Ecommerce -->
                       
                     </ul>
                  </div>
                  <!--/ Mega Menu End-->
                  <!--/ Brand and Logo End -->
                  <!--================================-->
                  <!-- Header Right Start -->
                  <!--================================-->
                  <div class="header-right pull-right">
                     <ul class="list-inline justify-content-end">
                        <li class="list-inline-item align-middle"><a  href="#" id="search-button"><i class="ion-ios-search-strong tx-20"></i></a></li>
                        <!--================================-->
                        <!-- Profile Dropdown Start -->
                        <!--================================-->
                        <li class="list-inline-item dropdown">
                           <a  href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="select-profile">Hi, <?php echo $user->nombre;?></span>
                           <img src="assets/images/avatar/avatar1.png" class="img-fluid wd-35 ht-35 rounded-circle" alt="">
                           </a>
                           <div class="dropdown-menu dropdown-menu-right dropdown-profile shadow-2">
                              <div class="user-profile-area">
                                 <div class="user-profile-heading">
                                    <div class="profile-thumbnail">
                                       <img src="assets/images/avatar/avatar1.png" class="img-fluid wd-35 ht-35 rounded-circle" alt="">
                                    </div>
                                    <div class="profile-text">
                                       <h6>John Deo</h6>
                                       <span>email@example.com</span>
                                    </div>
                                 </div>
                                 <a href="#" class="dropdown-item"><i class="icon-user" aria-hidden="true"></i> My profile</a>
                                 <a href="#" class="dropdown-item"><i class="icon-envelope" aria-hidden="true"></i> Messages <span class="badge badge-success ft-right mg-t-3">10+</span></a>
                                 <a href="#" class="dropdown-item"><i class="icon-settings" aria-hidden="true"></i> settings</a>
                                 <a href="#" class="dropdown-item"><i class="icon-share" aria-hidden="true"></i> My Activity <span class="badge badge-warning ft-right mg-t-3">5+</span></a>
                                 <a href="#" class="dropdown-item"><i class="icon-cloud-download" aria-hidden="true"></i> My Download <span class="badge badge-success ft-right mg-t-3">10+</span></a>
                                 <a href="#" class="dropdown-item"><i class="icon-heart" aria-hidden="true"></i> Support</a>
                                 <a href="./logout.php" class="dropdown-item"><i class="icon-power" aria-hidden="true"></i> Sign-out</a>
                              </div>
                           </div>
                        </li>
                        <!-- Profile Dropdown End -->
                        <!--================================-->

                     </ul>
                  </div>
                  <!--/ Header Right End -->
               </nav>
            </div>
            <!--/ Page Header End -->
            <!--================================-->
            <!-- Page Inner Start -->
            <!--================================-->
            <div class="page-inner">
               <!--================================-->
               <!-- Main Wrapper Start -->
               <!--==============LAS LLAMADAS A LOS DEMAS==================-->
               		
                <?php   View::load("ViewPrincipal"); ?>

               <!--/ Main Wrapper End -->
               </div>
            <!--/ Page Inner End -->
            <!--================================-->
            <!-- Page Footer Start -->	
            <!--================================-->
            <!--footer class="page-footer">
               <div class="pd-t-4 pd-b-0 pd-x-20">
                  <div class="tx-10 tx-uppercase">
                     <p class="pd-y-10 mb-0">Copyright&copy; 2019 | All rights reserved. | Created By <a href="http://themeforest.net/user/colorlibcode" target="_blank">ColorlibCode</a></p>
                  </div>
               </div>
            </footer-->
            <!--/ Page Footer End -->
         </div>
         <!--/ Page Content End  -->
      </div>
      <!--/ Page Container End -->
               <?php 

                                 }else{
                                    ?>
                              <div style="background-image: url('assets/images/agua2.jpg');">
                                    <div class="ht-100v d-flex">
                                       <div class="card shadow-none pd-20 mx-auto wd-300 text-center bd-1 align-self-center">
                                           <center> <img src="assets/images/LOGO.jpeg" width="40%"></center>
                                       
                                           <h4 class="card-title mt-3 text-center">Login</h4>
                                        
                                  
                                      
                                          <form role="form" action="index.php?action=processlogin" method="post"> 
                                           
                                          <input type="hidden" class="form-control"  id="direccion"  value="<?php echo $_SERVER["REQUEST_URI"];?>" name="direccion">
                                                   <div class="form-group">
                                                      <label for="exampleInputEmail1">Usuario</label>
                                                      <input type="text" class="form-control" required="" id="exampleInputEmail1" placeholder="Ingrese su usuario" name="username">
                                                   </div>
            
                                                   <div class="form-group">
                                                      <label for="exampleInputPassword1">Contraseña</label>
                                                      <input type="password" name="password" required="" class="form-control" id="exampleInputPassword1" placeholder="Ingrese su Password">
                                                   </div>
            
            
                                                <!--       <p class="text-center"><a href="">Forget Password?</a></p>-->
                                             <div class="form-group">
                                                <button type="submit" class="btn btn-custom-primary btn-block tx-13 hover-white"> Login </button>
                                             </div>
                                                 <!--   <p class="text-center">Don't have an account?<br/> <a href="">Create Account</a> </p>-->
                                          </form>
                                       </div>
                                    </div>
                              </div>
            
            
            
            
                           <?php }
                                    ?>
               


      
      <!--================================-->
      <!-- Scroll To Top Start-->
      <!--================================-->	
      <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
      <!--/ Scroll To Top End -->
      <!--================================-->
          
      <!--================================-->
      <!-- Footer Script -->
      <!--================================-->
      <script src="assets/plugins/jquery/jquery.min.js"></script>
      <script src="assets/plugins/jquery-ui/jquery-ui.js"></script>
      <script src="assets/plugins/popper/popper.js"></script>
      <script src="assets/plugins/feather-icon/feather.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/plugins/pace/pace.min.js"></script>
      <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="assets/plugins/datatables/responsive/dataTables.responsive.js"></script>
      <script src="assets/plugins/datatables/extensions/dataTables.jqueryui.min.js"></script>
      <script src="assets/plugins/simpler-sidebar/jquery.simpler-sidebar.min.js"></script>
      <script src="assets/js/jquery.slimscroll.min.js"></script>
      <script src="assets/js/highlight.min.js"></script>
      <script src="assets/js/app.js"></script>
      <script src="assets/js/custom.js"></script>
      <script src="assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>

      <script src="assets/plugins/moment/moment.min.js"></script>
      <script src="assets/plugins/datepicker/js/datepicker.min.js"></script>
      <script src="assets/plugins/datepicker/js/datepicker.es.js"></script>
      <script type="text/javascript">
         // Time Picker 1  
         $('#timepicker1').timepicker();
         
         // Create start date
         var start = new Date(),
         prevDay,
         startHours = 9;
         
         // 09:00 AM
         start.setHours(9);
         start.setMinutes(0);
         
         // If today is Saturday or Sunday set 10:00 AM
         if ([6, 0].indexOf(start.getDay()) != -1) {
         start.setHours(10);
         startHours = 10
         }
         
         $('#timepicker-actions-exmpl').datepicker({
         timepicker: true,
         language: 'en',
         startDate: start,
         minHours: startHours,
         maxHours: 18,
         onSelect: function (fd, d, picker) {
         // Do nothing if selection was cleared
         if (!d) return;
         
         var day = d.getDay();
         
         // Trigger only if date is changed
         if (prevDay != undefined && prevDay == day) return;
         prevDay = day;
         
         // If chosen day is Saturday or Sunday when set
         // hour value for weekends, else restore defaults
         if (day == 6 || day == 0) {
         picker.update({
         minHours: 10,
         maxHours: 16
         })
         } else {
         picker.update({
         minHours: 9,
         maxHours: 18
         })
         }
         }
         })
      </script>
           <script>
         // Example starter JavaScript for disabling form submissions if there are invalid fields
         (function() {
           'use strict';
           window.addEventListener('load', function() {
             // Fetch all the forms we want to apply custom Bootstrap validation styles to
             var forms = document.getElementsByClassName('needs-validation');
             // Loop over them and prevent submission
             var validation = Array.prototype.filter.call(forms, function(form) {
               form.addEventListener('submit', function(event) {
                 if (form.checkValidity() === false) {
                   event.preventDefault();
                   event.stopPropagation();
                 }
                 form.classList.add('was-validated');
               }, false);
             });
           }, false);
         })();
      </script>
      <script>
         // Basic DataTable	
          $('#basicDataTable').DataTable({
         	responsive: true,
         	language: {
         	  searchPlaceholder: 'Search...',
         	  sSearch: ''
         	}
           });
           
         // No Style DataTable	
          $('#noStyleedTable').DataTable({
         	responsive: true,
         	language: {
         	  searchPlaceholder: 'Search...',
         	  sSearch: ''
         	}
           });
           
         // Cell Border DataTable	
          $('#cellBorder').DataTable({
         	responsive: true,
         	language: {
         	  searchPlaceholder: 'Search...',
         	  sSearch: ''
         	}
           });
           
         // Compact DataTable	
          $('#compactTable').DataTable({
         	responsive: true,
         	language: {
         	  searchPlaceholder: 'Search...',
         	  sSearch: ''
         	}
           });
           
         // Hoverable DataTable	
          $('#hoverTable').DataTable({
         	responsive: true,
         	language: {
         	  searchPlaceholder: 'Search...',
         	  sSearch: ''
         	}
           });
           
         // Hoverable DataTable	
          $('#orderActiveTable').DataTable({
         	responsive: true,
         	language: {
         	  searchPlaceholder: 'Search...',
         	  sSearch: ''
         	},
         	"order": [[ 1, "desc" ]]
           });
         
         // Scrollable Table DataTable	
          $('#scrollableTable').DataTable({
         	responsive: true,
         	language: {
         	  searchPlaceholder: 'Search...',
         	  sSearch: ''
         	},
         	"order": [[ 1, "desc" ]],
         	"scrollY":        "250px",
         	"scrollCollapse": true,
         	"paging":         false
           });
      </script>
      <script type="text/javascript">
        

        $(document).ready(function () {
      $('#dtHorizontalVerticalExample').DataTable({
        
        
      "scrollX": true,
      "scrollY": 450,
      "order": [[ 0, "desc" ]]
      });
      $('.dataTables_length').addClass('bs-select');
      });
  </script>
  
   </body>

<!-- Mirrored from colorlib.net/metrical/light/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Jan 2020 21:19:25 GMT -->
</html>

</body>  
</html>