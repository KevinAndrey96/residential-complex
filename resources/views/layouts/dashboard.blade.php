<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mega Able bootstrap admin template by codedthemes </title>
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
      <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="/dash/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="/dash/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="/dash/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="/dash/icon/themify-icons/themify-icons.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="/dash/icon/font-awesome/css/font-awesome.min.css">
      <!-- scrollbar.css -->
      <link rel="stylesheet" type="text/css" href="/dash/jquery.mCustomScrollbar.css">
        <!-- am chart export.css -->
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="/dash/style.css">
      <link href="/js/datatables/datatables/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
  </head>



  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
          <nav class="navbar header-navbar pcoded-header" header-theme="theme2">
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

                      <div style="margin: 0px auto;">
                      <a href="index.html">
                          <img style="width:90px; border-radius: 5%;" class="img-fluid img-responsive center-block" src="/assets/images/logo.png" alt="Theme-Logo" />
                      </a>
                      </div>
                      <a class="mobile-options waves-effect waves-light">
                          <i class="ti-more"></i>
                      </a>
                  </div>

                  <div class="navbar-container container-fluid">
                      <ul class="nav-left">
                          <li>
                              <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                          </li>
                          <li class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                  <i class="ti-fullscreen"></i>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav-right">
                          <li class="header-notification">
                              <a href="#!" class="waves-effect waves-light">
                                  <i class="ti-bell"></i>
                                  <span class="badge bg-c-red"></span>
                              </a>
                              <ul class="show-notification">
                                  <li>
                                      <h6>Notifications</h6>
                                      <label class="label label-danger">New</label>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <div class="media">
                                          <img class="d-flex align-self-center img-radius" src="/assets/images/1-old.jpg" alt="Generic placeholder image">
                                          <div class="media-body">
                                              <h5 class="notification-user">{{ Auth::user()->name }}</h5>
                                              <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                              <span class="notification-time">30 minutes ago</span>
                                          </div>
                                      </div>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <div class="media">
                                          <img class="d-flex align-self-center img-radius" src="/assets/images/1-old.jpg" alt="Generic placeholder image">
                                          <div class="media-body">
                                              <h5 class="notification-user">Joseph William</h5>
                                              <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                              <span class="notification-time">30 minutes ago</span>
                                          </div>
                                      </div>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <div class="media">
                                          <img class="d-flex align-self-center img-radius" src="/assets/images/1-old.jpg" alt="Generic placeholder image">
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
                                  <img src="/assets/images/1-old.jpg" class="img-radius" alt="User-Profile-Image">
                                  <span>{{ Auth::user()->name }}</span>
                                  <i class="ti-angle-down"></i>
                              </a>
                              <ul class="show-notification profile-notification">
                                  <li class="waves-effect waves-light">
                                      <a href="#!">
                                          <i class="ti-settings"></i> Configuraciones
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <a href="user-profile.html">
                                          <i class="ti-user"></i> Perfil
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <a href="email-inbox.html">
                                          <i class="ti-email"></i> Mis mensajes
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <a href="auth-lock-screen.html">
                                          <i class="ti-lock"></i> Bloquear pantalla
                                      </a>
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
              <div class="pcoded-wrapper">
                  @hasrole('Superadmin')
                  <nav class="pcoded-navbar">
                      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                      <div class="pcoded-inner-navbar main-menu">
                          <div class="">
                              <div class="main-menu-header">
                                  <img class="img-80 img-radius" src="/assets/images/1-old.jpg" alt="User-Profile-Image">
                                  <div class="user-details">
                                      <span id="more-details">{{ Auth::user()->name }}<i class="fa fa-caret-down"></i></span>
                                  </div>
                              </div>

                              <div class="main-menu-content">
                                  <ul>
                                      <li class="more-details">
                                          <a href="user-profile.html"><i class="ti-user"></i>Ver perfil</a>
                                          <a href="#!"><i class="ti-settings"></i>Configuraciones</a>
                                          <a href="auth-normal-sign-in.html"><i class="ti-layout-sidebar-left"></i>Cerrar sesión</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>


                          <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Menú</div>
                          <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded-hasmenu ">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>M</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Administradores</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="/adminrecep" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Ver</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="/adminrecep/create" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Crear</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>


                          <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded-hasmenu ">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>M</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Roles y Permisos</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.main">Roles</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="/role" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Ver</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="/role/create" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Crear</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>


                                </ul>
                                <ul class="pcoded-submenu">
                                    <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.main">Permisos</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Ver</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="/permission/create" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Crear</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>


                                </ul>
                            </li>
                        </ul>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded-hasmenu ">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>M</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Configuraciones</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="/setting" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Ver</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="/setting/create" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Crear</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>

                            <li>
                        </ul>
                        </div>
                    </nav>
                  @endhasrole
                  @hasrole('Administrator')
                  <nav class="pcoded-navbar">
                      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                      <div class="pcoded-inner-navbar main-menu">
                          <div class="">
                              <div class="main-menu-header">
                                  <img class="img-80 img-radius" src="/assets/images/1-old.jpg" alt="User-Profile-Image">
                                  <div class="user-details">
                                      <span id="more-details">{{ Auth::user()->name }}<i class="fa fa-caret-down"></i></span>
                                  </div>
                              </div>

                              <div class="main-menu-content">
                                  <ul>
                                      <li class="more-details">
                                          <a href="user-profile.html"><i class="ti-user"></i>Ver perfil</a>
                                          <a href="#!"><i class="ti-settings"></i>Configuraciones</a>
                                          <a href="auth-normal-sign-in.html"><i class="ti-layout-sidebar-left"></i>Cerrar sesión</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>


                          <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Menú</div>
                          <ul class="pcoded-item pcoded-left-item">
                              <li class="pcoded-hasmenu ">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>M</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Residentes</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                      <li class="">
                                          <a href="/residents" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Ver</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                      <li class="">
                                          <a href="/residents/create" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Crear</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                  </ul>
                              </li>
                              <li class="pcoded-hasmenu ">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>M</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Servicios</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                      <li class="">
                                          <a href="/services" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Ver</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                      <li class="">
                                          <a href="/services/create" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Crear</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                  </ul>
                              </li>
                              <li class="pcoded-hasmenu ">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>M</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Reservaciones</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                      <li class="">
                                          <a href="/bookings" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Ver</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                  </ul>
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
                              <div class="main-menu-header">
                                  <img class="img-80 img-radius" src="/assets/images/1-old.jpg" alt="User-Profile-Image">
                                  <div class="user-details">
                                      <span id="more-details">{{ Auth::user()->name }}<i class="fa fa-caret-down"></i></span>
                                  </div>
                              </div>

                              <div class="main-menu-content">
                                  <ul>
                                      <li class="more-details">
                                          <a href="user-profile.html"><i class="ti-user"></i>Ver perfil</a>
                                          <a href="#!"><i class="ti-settings"></i>Configuraciones</a>
                                          <a href="auth-normal-sign-in.html"><i class="ti-layout-sidebar-left"></i>Cerrar sesión</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>


                          <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Menú</div>
                          <ul class="pcoded-item pcoded-left-item">
                              <li class="pcoded-hasmenu ">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>M</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Reservas</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                      <li class="">
                                          <a href="/bookings" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Mis reservas</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                      <li class="">
                                          <a href="/bookings/create" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Crear</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                  </ul>
                              </li>
                          </ul>

                      </div>
                  </nav>
                  @endhasrole
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Porto Americas</h5>
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
                                  <div class="col-md-4">
                                        <!--
                                        <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.html"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                          </li>
                                      </ul>
                                        -->
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
    <script type="text/javascript" src="/js/SmoothScroll.js"></script>
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
    <script src="/dash/js/demo/datatables-demo.js"></script>

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
        } ).responsive.recalc();
    } );

</script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
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
