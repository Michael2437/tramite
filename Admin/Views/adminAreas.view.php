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

    <script type="text/javascript">
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#ShowPassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
</script>
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
                                    <a href="adminAreas.php" class="mm-active">
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
                                           <a href="crearTexpediente.php">
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Areas Existentes
                                        <div class="btn-actions-pane-right">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <a href="crearArea.php" class="btn btn-primary">Nuevo</a>
                                            <!--    <button class="active btn btn-focus">Last Week</button>
                                                <button class="btn btn-focus">All Month</button>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive ">
                                        <table class="align-middle  mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Nombre de Area</th>
                                                <th class="text-center">Contraseña</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php while($fila=$areas->fetch()){
                                                    $id=$fila['idArea'];
                                                    $nomArea=$fila['nomArea'];
                                                    $constraseña=$fila['codArea'];
                                                ?>
                                            <tr>
                                                <td  class="text-center">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading"><?php echo $nomArea;?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="row">
                                                        <div class="col-md-4"></div>
                                                        
                                                    
                                                         <div class="col-md-4">
                                                        <input class="form-control" id="Password" type="password" value="<?php echo $constraseña;?>" readonly>
                                                        </div><div class="col-md-2">
                                                        <div class="position-relative form-check"><label class="form-check-label">
                                                            <input type="checkbox" id="ShowPassword" class="form-check-input"> Ver</label></div>
                                                
                                                        </div>
                                                    </div>
                                                    
                                                </td>
                                                
                                                <td class="text-center">
                                                    <a href="modificarArea.php?id=<?php echo $id;?>" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Modificar</a>
                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                                </td>
                                            </tr><?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-block text-center card-footer">
                                    <input type="checkbox" id="ShowPassword" class="form-check-input"> 
                                       <button class="btn-wide btn btn-success">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
        </div>
    </div>

    <script>
$(document).ready(function () {
  $('#mostrar_contrasena').click(function () {
    if ($('#mostrar_contrasena').is(':checked')) {
      $('#contrasena').attr('type', 'text');
    } else {
      $('#contrasena').attr('type', 'password');
    }
  });
});
</script>
<script type="text/javascript" src="../Views/assets/scripts/main.js"></script></body>
</html>
