<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Wide selection of forms controls, using the Bootstrap 4 code base, but built with React.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="../Views/main.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
            <img src="../Views/assets/logos/logo.png" alt="" class="logo-src">
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                           </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="views/assets/images/mesadepartes.jpg" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            
                                            <a href="../cerrarLogin.php"><button type="button" tabindex="0" class="dropdown-item" >Cerrar Sesion</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        <?php echo $area;?>
                                    </div>
                                    <div class="widget-subheading">
                                    <?php echo $rol;?>
                                    </div>
                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                   
                                </div>
                            </div>
                        </div>
                    </div>        </div>
            </div>
        </div>
        
        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                    <img src="../Views/assets/logos/logo.png" alt="" class="logo-src">
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>
                    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Inicio</li>
                                <li>
                                    <a href="indexAdmin.php" >
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Principal
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Crear</li>
                                <li class="mm-show">
                                    <a href="adminArea.php" >
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Areas
                                    </a>
                                </li>
                                <li>
                                    <a href="#" >
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Mesa de Partes
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul >
                                       <li>
                                           <a href="crearTexp.php">
                                               <i class="metismenu-icon mm-active""></i>
                                                Tipo de Expediente
                                           </a>
                                       </li>
                                       <li>
                                           <a href="crearTusuario.php">
                                               <i class="metismenu-icon">
                                               </i>Tipo de Usuario
                                           </a>
                                       </li>
                                   </ul>
                                </li>
                                <li class="app-sidebar__heading">Modificar</li>
                                <li >
                                    <a href="#" >
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Usuario
                                    </a>
                                </li>
                                <li >
                                    <a href="#" >
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Expediente
                                    </a>
                                </li>
                                <li >
                                    <a href="#" >
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        MAs funcionalidades 
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                       <li>
                                           <a href="elements-buttons-standard.html">
                                               <i class="metismenu-icon"></i>
                                               Modificar Expediente
                                           </a>
                                       </li>
                                       <li>
                                           <a href="elements-dropdowns.html">
                                               <i class="metismenu-icon">
                                               </i>Eliminar Expediente
                                           </a>
                                       </li>
                                       
                                      
                                   </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                     <div class="col-md-6">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Crear Nueva Area</h5>
                                                <form action="crearArea.php" method="Post" name="crearArea">
                                                    <div class="position-relative form-group">
                                                        <label for="exampleEmail" class="">Nombre de Area</label>
                                                        <input name="nomArea" id="nomArea" placeholder="Ingrese el nombre del Area" type="text" class="form-control" autocomplete="off">
                                                    </div>
                                                    <div class="position-relative form-group">
                                                        <label for="examplePassword" class="">Contraseña</label>
                                                        <div class="input-group">
                                                        <input name="pass" id="pass" placeholder="Ingrese la contraseña" type="password"class="form-control">
                                                        <div class="input-group-append">
                                                            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                                        </div>            
                                                        </div>
                                                    </div>
                                                    <div class="position-relative form-group">
                                                        <label for="examplePassword" class="">Confirmar Contraseña</label>
                                                        <div class="input-group">
                                                        <input name="passCon" id="passCon" placeholder="Confirme la contraseña" type="password"class="form-control">
                                                        <div class="input-group-append">
                                                            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarConfirm()"> <span class="fa fa-eye-slash icon"></span> </button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary">Crear</button>
                                                        <a href="adminAreas.php" class="btn btn-primary">Cancelar</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
        </div>
    </div>
<script type="text/javascript" src="Views/js/funciones.js"></script> 
<script type="text/javascript" src="../Views/assets/scripts/main.js"></script>
</body>
</html>
