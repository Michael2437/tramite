<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Modificar Usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Build whatever layout you need with our Architect framework.">
    <meta name="msapplication-tap-highlight" content="no">
<link href="../Views/main.css" rel="stylesheet"></head>
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
                                            <button type="button" tabindex="0" class="dropdown-item">User Account</button>
                                            <button type="button" tabindex="0" class="dropdown-item">Settings</button>
                                            <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                            <button type="button" tabindex="0" class="dropdown-item">Actions</button>
                                            <div tabindex="-1" class="dropdown-divider"></div>
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
                    </div>
                  </div>
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
                              <a href="indexMDP.php" >
                                  <i class="metismenu-icon pe-7s-rocket"></i>
                                  Principal
                              </a>
                          </li>
                          <li class="app-sidebar__heading">Registro</li>
                          <li>
                              <a href="#" >
                                  <i class="metismenu-icon pe-7s-diamond"></i>
                                  Usuarios
                                  <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                              </a>
                              <ul class="mm-show">
                                  <li>
                                      <a href="usuarioNuevo.php" >
                                          <i class="metismenu-icon"></i>
                                          Nuevo Usuario
                                      </a>
                                  </li>
                                  <li>
                                      <a href="usuarioBuscar.php" class="mm-active">
                                          <i class="metismenu-icon">
                                          </i>Buscar usuario
                                      </a>
                                  </li>
                              </ul>
                          </li>
                          <li>
                              <a href="#">
                                  <i class="metismenu-icon pe-7s-car"></i>
                                  Expedientes
                                  <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                              </a>
                              <ul>
                                  <li>
                                      <a href="expedienteNuevo.php">
                                          <i class="metismenu-icon">
                                          </i>Nuevo Expediente
                                      </a>
                                  </li>
                                  <li>
                                      <a href="expedienteBuscar.php">
                                          <i class="metismenu-icon">
                                          </i>Buscar Expediente
                                      </a>
                                  </li>
                              </ul>
                          </li>

                          <li class="app-sidebar__heading">Seguimiento</li>
                          <li>
                              <a href="dashboard-boxes.html">
                                  <i class="metismenu-icon pe-7s-display2"></i>
                                  Usuarios
                              </a>
                              <a href="dashboard-boxes.html">
                                  <i class="metismenu-icon pe-7s-display2"></i>
                                  Expediente
                              </a>
                          </li>

                      </ul>
                  </div>
              </div>
          </div>
          <div class="app-main__outer">
                    <div class="app-main__inner">

                      <div class="tab-content">
                          <div class="tab-pane tabs-animation fade show active"  role="tabpanel">
                            <!-- Inicio del Formulario-->
                            <div class="row">
                              <div class="col-md-2">

                              </div>
                              <div class="main-card mb-3 card">
                                  <div class="card-body"><h5 class="card-title">Modificar Usuario</h5>
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="modificaruser"  method="post">
                                      <div class="form-row">
                                        <div class="col-md-3">
                                            <div class="position-relative form-group"><label class="">DNI</label>
                                            <input type="hidden" name="dnir" id="dnir" value="<?php if(!empty($dni)){echo $dni;}?>">
                                              <input name="dni" value="<?php if(!empty($dni)){echo $dni;} ?>" id="dni" type="number" placeholder="N° DNI" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative form-group"><label  class="">Nombres</label>
                                              <input name="nombres" value="<?php if(!empty($dni)){echo $nombres;} ?>" id="nombres" placeholder="Ingrese los nombres" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="position-relative form-group"><label  class="">Apellidos</label>
                                              <input name="apellidos" value="<?php if(!empty($dni)){echo $apellidos;} ?>" id="apellidos" placeholder="Ingrese los apellidos" type="text" class="form-control">
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="col-md-8">
                                          <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Dirección</label>
                                            <input name="direccion" id="direccion" value="<?php if(!empty($dni)){echo $direccion;} ?>" placeholder="Ingrese la dirección" type="text" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="position-relative form-group"><label for="exampleEmail11" class="">Telefono</label>
                                            <input name="telefono" id="telefono" value="<?php if(!empty($dni)){echo $telefono;} ?>" placeholder="123-456-789" type="tel" class="form-control" >
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="col-md-8">
                                          <div class="position-relative form-group"><label for="examplePassword11" class="">Correo</label>
                                            <input name="correo" id="correo" value="<?php if(!empty($dni)){echo $correo;} ?>" placeholder="Ingrese correo electrónico" type="email" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="position-relative form-group"><label for="exampleAddress" class="">Tipo Usuario</label>
                                            <select name="tipo" id="tipo" onchange="buscar_archivos()" class="mb-2 form-control">
                                            <option></option> 
                                            <option value="1">Normal</option>
                                            <option value="2">Jurídico</option> 
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <div id ="selectorder"></div>
                                      <div class="form-row">

                                        <div class="col-md-6">
                                          <div class="text-center">
                                            <button type="button" class="mt-2 btn btn-primary" data-toggle="modal" data-target=".cancelar">Cancelar</button>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="text-center">
                                           <button  type="submit" class="btn mt-2 mb-2 btn-primary" >Guardar datos</button>
                                          </div>
                                        </div>
                                      </div>
                                          <?php if(isset($salida)){echo $salida;}?>
                                    </form>

                                  </div>
                              </div>
                              <div class="col-md-2">

                              </div>
                            </div>
                            <!-- fin del formulario-->


                          </div>

                      </div>
                    </div>
              </div>
        </div>
    </div>

<script type="text/javascript" src="../Views/assets/scripts/main.js"></script>
<script type="text/javascript" src="../Views/assets/scripts/funciones.js"></script>
<script type="text/javascript" src="../Views/assets/scripts/jquery.min.js"></script>
</body>
</html>


<div class="modal fade cancelar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cancelar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro de cancelar sin guardar la modificación?</p>
            </div>
            <div class="modal-footer">
                <a href="usuarioBuscar.php?iduser=<?php echo $iduser;?>"><button type="button" class="btn btn-secondary" >Si</button></a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>


