<!DOCTYPE html>
<html lang="en">

<head>
    <title>Porto Américas</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file: -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="codedthemes" />
      <!-- Favicon icon -->
      <link rel="icon" href="/assets/images/logo.ico" type="image/x-icon">
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="/dash/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="/dash/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="/dash/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="/dash/icon/font-awesome/css/font-awesome.min.css">
      <!-- scrollbar.css -->
      <link rel="stylesheet" type="text/css" href="/dash/jquery.mCustomScrollbar.css">
        <!-- am chart export.css -->
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

    <!-- Magnific popup-->
    <link rel="stylesheet" type="text/css" href="/dash/vendor/Magnific-Popup-master/dist/magnific-popup.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="/dash/style.css">
      <link href="/js/datatables/datatables/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
  </head>
  <!-- Pre-loader end -->
<body>
  <div id="pcoded" class="pcoded">
      <div class="pcoded-container navbar-wrapper">
          <nav style="background-color: #e20613; padding: 5px 0px" class="navbar header-navbar pcoded-header" header-theme="theme2">
              <div class="navbar-wrapper">
                  <div class="navbar-logo">
                      <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                          <i class="ti-menu"></i>
                      </a>
                      <div class="mobile-search waves-effect waves-light">
                          <div class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control" placeholder="Enter Keyword">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div style="margin: 10px auto;">
                      <a href="/home">
                          <img style="width: 95px;" class="img-fluid img-responsive center-block" src="/assets/images/logo_blanco_pa.png" alt="Theme-Logo" />
                      </a>
                      </div>
                      <a class="mobile-options waves-effect waves-light">
                          <i class="ti-more"></i>
                      </a>
                  </div>

                  <div class="navbar-container container-fluid">
                      <ul  class="nav-left">
                          <li>
                              <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                          </li>
                          <li class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control">
                                      <!--<span class="input-group-addon search-btn"><i class="ti-search"></i></span>-->
                                  </div>
                              </div>
                          </li>
                          <!--
                          <li>
                              <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                  <i class="ti-fullscreen"></i>
                              </a>
                          </li>
                          -->
                      </ul>
                      <ul  class="nav-right">
                          <li class="header-notification">
                              <a href="#!" class="waves-effect waves-light">
                                 <!--<i class="ti-bell"></i>-->
                                  <!--<span class="badge bg-c-red"></span>-->
                              </a>
                              <ul class="show-notification">
                                  <li>
                                      <h6>Notifications</h6>
                                      <label class="label label-danger">New</label>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <div class="media">
                                          <img class="d-flex align-self-center img-radius" src="/assets/images/persona.png" alt="Generic placeholder image">
                                          <div class="media-body">
                                              <h5 class="notification-user">{{ Auth::user()->name }}</h5>
                                              <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                              <span class="notification-time">30 minutes ago</span>
                                          </div>
                                      </div>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <div class="media">
                                          <img class="d-flex align-self-center img-radius" src="/assets/images/persona.png" alt="Generic placeholder image">
                                          <div class="media-body">
                                              <h5 class="notification-user">Joseph William</h5>
                                              <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                              <span class="notification-time">30 minutes ago</span>
                                          </div>
                                      </div>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <div class="media">
                                          <img class="d-flex align-self-center img-radius" src="/assets/images/persona.png" alt="Generic placeholder image">
                                          <div class="media-body">
                                              <h5 class="notification-user">Sara Soudein</h5>
                                              <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                              <span class="notification-time">30 minutes ago</span>
                                          </div>
                                      </div>
                                  </li>
                              </ul>
                          </li>
                          <li class="user-profile header-notification">
                              <a href="#!" class="waves-effect waves-light">
                                  <img src="/assets/images/persona.png" class="img-radius" alt="User-Profile-Image">
                                  <span>{{ Auth::user()->name }}</span>
                                  <i class="ti-angle-down"></i>
                              </a>
                              <ul class="show-notification profile-notification">
                                  <li class="waves-effect waves-light">
                                      <a href="/user/passwordEdit/{{ Auth::user()->id }}">
                                          <i class="ti-unlock"></i> Cambiar contraseña
                                      </a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                      </form>
                                  </li>
                                  <li class="waves-effect waves-light">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <i class="ti-layout-sidebar-left"></i> Cerrar sesión
                                    </a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                      </form>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>

          <div class="pcoded-main-container">
              <div style="background-color: #181818;" class="">
                  @hasrole('Superadmin')
                  <nav class="pcoded-navbar">
                      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                      <div class="pcoded-inner-navbar main-menu">
                          <div class="">
                              <div style="background-color: white;" class="main-menu-header">
                                  <img class="img-80 img-radius" src="/assets/images/persona.png" alt="User-Profile-Image">
                                  <div class="user-details">
                                      <span id="more-details">{{ Auth::user()->name }}<i class="fa fa-caret-down"></i></span>
                                  </div>
                              </div>

                              <div class="main-menu-content">
                                  <ul>
                                      <li class="more-details">
                                          <a href="auth-normal-sign-in.html" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"><i class="ti-layout-sidebar-left"></i>Cerrar sesión</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <div class="pcoded-navigation-label text-center mt-4" data-i18n="nav.category.navigation">
                              <p style="color: #96040e; font-size: 15px; font-weight: bold;" class="text-center">Menú</p>
                          </div>
                          <ul class="pcoded-item pcoded-left-item">
                            <li>
                                <a href="/adminrecep"><span style="margin-right: 25px;" class="material-symbols-outlined align-middle">group</span>
                                    Ver administradores
                                </a>
                            </li>
                              <li class="">
                                  <a href="/adminrecep/create" >
                                      <span style="margin-right: 25px;" class="material-symbols-outlined align-middle">person_add</span>
                                      Crear administrador
                                  </a>
                              </li>
                          </ul>
                        </div>
                    </nav>
                  @endhasrole
                  @hasrole('Administrator')
                  <nav class="pcoded-navbar">
                      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                      <div class="pcoded-inner-navbar main-menu">
                          <div class="">
                              <div style="background-color: white;" class="main-menu-header">
                                  <img class="img-80 img-radius" src="/assets/images/persona.png" alt="User-Profile-Image">
                                  <div class="user-details">
                                      <span id="more-details">{{ Auth::user()->name }}<i class="fa fa-caret-down"></i></span>
                                  </div>
                              </div>

                              <div class="main-menu-content">
                                  <ul>
                                      <li class="more-details">
                                          <a href="auth-normal-sign-in.html" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"><i class="ti-layout-sidebar-left"></i>Cerrar sesión</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <div class="pcoded-navigation-label text-center mt-4" data-i18n="nav.category.navigation">
                              <p style="color: #96040e; font-size: 15px; font-weight: bold;" class="text-center">Menú</p>
                          </div>
                          <ul class="pcoded-item pcoded-left-item">
                              <li>
                                  <a href="/residents"><span style="margin-right: 25px;"
                                      class="material-symbols-outlined align-middle">group</span>
                                      Ver residentes
                                  </a>
                              </li>
                              <li>
                                  <a href="/residents/create"><span style="margin-right: 25px;"
                                     class="material-symbols-outlined align-middle">group_add</span>
                                     Crear residentes
                                  </a>
                              </li>
                              <li>
                                  <a href="/adminrecep"><span style="margin-right: 25px;"
                                      class="material-symbols-outlined align-middle">person_search</span>
                                      Ver recepcionistas
                                  </a>
                              </li>
                              <li>
                                  <a href="/receptionists/create"><span style="margin-right: 25px;"
                                     class="material-symbols-outlined align-middle">person_add</span>
                                     Crear recepcionistas
                                  </a>
                              </li>
                              <li>
                                  <a href="/services"><span style="margin-right: 25px;"
                                      class="material-symbols-outlined align-middle">inbox_customize</span>
                                      Ver servicios
                                  </a>
                              </li>
                              <li>
                                  <a href="/services/create"><span style="margin-right: 25px;"
                                     class="material-symbols-outlined align-middle">add_photo_alternate</span>
                                     Crear servicios
                                  </a>
                              </li>
                              <li>
                                  <a href="/bookings"><span style="margin-right: 25px;"
                                      class="material-symbols-outlined align-middle">book_online</span>
                                      Reservaciones
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </nav>
                  @endhasrole
                  @hasrole('Receptionist')
                  <nav class="pcoded-navbar">
                      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                      <div class="pcoded-inner-navbar main-menu">
                          <div class="">
                              <div style="background-color: white;" class="main-menu-header">
                                  <img class="img-80 img-radius" src="/assets/images/persona.png" alt="User-Profile-Image">
                                  <div class="user-details">
                                      <span id="more-details">{{ Auth::user()->name }}<i class="fa fa-caret-down"></i></span>
                                  </div>
                              </div>

                              <div class="main-menu-content">
                                  <ul>
                                      <li class="more-details">
                                          <a href="auth-normal-sign-in.html" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"><i class="ti-layout-sidebar-left"></i>Cerrar sesión</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <div class="pcoded-navigation-label text-center mt-4" data-i18n="nav.category.navigation">
                              <p style="color: #96040e; font-size: 15px; font-weight: bold;" class="text-center">Menú</p>
                          </div>
                          <ul class="pcoded-item pcoded-left-item ">
                              <li class="text-center">
                                  <a style="font-size: 15px;" href="/bookings" class="waves-effect waves-dark text-center">Reservaciones</a>
                              </li>
                          </ul>
                      </div>
                  </nav>

                  @endhasrole
                  @hasrole('Resident')
                  <nav class="pcoded-navbar">
                      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                      <div class="pcoded-inner-navbar main-menu">
                          <div class="">
                              <div style="background-color: white;" class="main-menu-header">
                                  <img class="img-80 img-radius" src="/assets/images/persona.png" alt="User-Profile-Image">
                                  <div class="user-details">
                                      <span id="more-details">{{ Auth::user()->name }}<i class="fa fa-caret-down"></i></span>
                                  </div>
                              </div>

                              <div class="main-menu-content">
                                  <ul>
                                      <li class="more-details">
                                          <a href="auth-normal-sign-in.html" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"><i class="ti-layout-sidebar-left"></i>Cerrar sesión</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>

                          <ul class="pcoded-item pcoded-left-item pt-5">
                              <li class="">
                                  <a href="/bookings">
                                      <span style="margin-right: 25px;" class="material-symbols-outlined align-middle">book_online</span>
                                      Mis reservas
                                  </a>
                              </li>
                              <li class="">
                                  <a href="/bookings/create">
                                      <span style="margin-right: 25px;" class="material-symbols-outlined align-middle">event_seat</span>
                                      Reservar
                                  </a>
                              </li>
                              </li>
                              @if (Auth::user()->extrainfo == null)
                              <li class="">
                                  <a href="/preinformation">
                                      <span style="margin-right: 25px;" class="material-symbols-outlined align-middle">quick_reference</span>
                                      Información extra
                                  </a>
                              </li>
                              @endif
                          </ul>
                      </div>
                  </nav>
                  @endhasrole
                  <div style="background-color: darkgray;" class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-12">
                                      <div class="page-header-title text-center">
                                          <h5 style="margin-bottom: -1px;">Porto Américas</h5>
                                          <p class="m-b-0">
                                            @hasrole('Superadmin')
                                              Bienvenido Super Administrador
                                              @endrole

                                              @hasrole('Administrator')
                                                Bienvenido Administrador
                                              @endrole

                                              @hasrole('Receptionist')
                                                Bienvenido Recepcionista
                                              @endrole

                                              @hasrole('Resident')
                                                Bienvenido Residente
                                              @endrole
                                          </p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->

                                    @yield('content')

                                    <!-- Page-body end -->
                                </div>
                                <!--<div id="styleSelector"> </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="assets/images/browser/chrome.png" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="assets/images/browser/firefox.png" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="assets/images/browser/opera.png" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="assets/images/browser/safari.png" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="assets/images/browser/ie.png" alt="">
                        <div>IE (9 & above)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
    <![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Jquery -->
    <script type="text/javascript" src="/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="/dash/pages/widget/excanvas.js "></script>
    <!-- waves js -->
    <script src="/dash/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="/js/modernizr/modernizr.js "></script>
    <!-- slimscroll js -->
    <!--<script type="text/javascript" src="/js/SmoothScroll.js"></script>-->
    <script src="/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- Chart js -->
    <script type="text/javascript" src="/js/chart.js/Chart.js"></script>
    <!-- amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="/dash/pages/widget/amchart/gauge.js"></script>
    <script src="/dash/pages/widget/amchart/serial.js"></script>
    <script src="/dash/pages/widget/amchart/light.js"></script>
    <script src="/dash/pages/widget/amchart/pie.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <!-- menu js -->
    <script src="/js/pcoded.min.js"></script>
    <script src="/js/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script type="text/javascript" src="/dash/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="/js/script.js "></script>

    <!--Datatables-->

    <!-- Page level plugins -->
    <script src="/js/datatables/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/js/datatables/datatables/js/dataTables.bootstrap4.min.js"></script>



<!-- Page level custom scripts -->
    <script src="/js/datatables/datatables/js/datatables-demo.js"></script>
<script src="https://kit.fontawesome.com/a53ddba772.js" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable( {
            "language": {
                "lengthMenu": " Mostar _MENU_ registros por página",
                "zeroRecords": "Nada encontrado - disculpa  ",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search" : "Buscar:",
                "paginate" : {
                    "next" : "Siguiente",
                    "previous": "Anterior"

                }
            },
            "bDestroy": true,
            responsive: true,
            "aaSorting": []
        } );
    } );
    $(document).ready(function() {
        $('#datatable1').DataTable( {
            "language": {
                "lengthMenu": " Mostar _MENU_ registros por página",
                "zeroRecords": "Nada encontrado - disculpa  ",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search" : "Buscar:",
                "paginate" : {
                    "next" : "Siguiente",
                    "previous": "Anterior"

                }
            },
            "bDestroy": true,
            responsive: true,
            "aaSorting": []
        } );
    } );

    $(document).ready(function() {
        $('#datatable2').DataTable( {
            "language": {
                "lengthMenu": " Mostar _MENU_ registros por página",
                "zeroRecords": "Nada encontrado - disculpa  ",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search" : "Buscar:",
                "paginate" : {
                    "next" : "Siguiente",
                    "previous": "Anterior"

                }
            },
            "bDestroy": true,
            responsive: true,
            "aaSorting": []
        } );
    } );
</script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<script scr="/dash/vendor/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="/dash/vendor/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>
<script type="text/javascript">
    $('.service').magnificPopup({
        type : 'image'
    });

</script>
<!--<script>
    $(function() {
        $('#toggle-two').bootstrapToggle({
            on: 'Enabled',
            off: 'Disabled'
        });
    })
</script>-->
</body>

</html>
