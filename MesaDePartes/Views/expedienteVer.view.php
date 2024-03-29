<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ver Expediente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Build whatever layout you need with our Architect framework.">
    <meta name="msapplication-tap-highlight" content="no">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    
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
                              <ul>
                                  <li>
                                      <a href="usuarioNuevo.php" >
                                          <i class="metismenu-icon"></i>
                                          Nuevo Usuario
                                      </a>
                                  </li>
                                  <li>
                                      <a href="usuarioBuscar.php">
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

                          <li class="app-sidebar__heading">VIRTUAL</li>
                          <li>
                          <a href="expedienteRecibido.php">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Expedientes
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
                            
                            <!-- fin del formulario-->
<!-- Inicio de la tabla-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Expedientes de <?php if(isset($nombres)){echo $nombres;}?>
                                        <div class="btn-actions-pane-right">
                                        <label for="">Ver:</label>
                                            <div role="group" class="btn-group-sm btn-group">
                                                <a href="expedienteVer.php?iduser=<?php echo $iduser?>&e=1" class="<?php if($e==1){echo $class;}?> btn btn-focus">Todos</a>
                                                <a href="expedienteVer.php?iduser=<?php echo $iduser?>&e=2" class="<?php if($e==2){echo $class;}?> btn btn-focus">Completados</a>
                                                <a href="expedienteVer.php?iduser=<?php echo $iduser?>&e=3" class="<?php if($e==3){echo $class;}?> btn btn-focus">Nuevos</a>
                                                <a href="expedienteVer.php?iduser=<?php echo $iduser?>&e=4" class="<?php if($e==4){echo $class;}?> btn btn-focus">Abiertos</a>
                                            </div>
                                        </div>
                                    </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                    
                                        <div class="card-body">
                                    
                                            <div class="form-row">
                                                <div class="col-md-3">
                                                    <div class="position-relative form-group"><label class="">DNI</label>
                                                        <input name="dni" disabled=»disabled» value="<?php if(!empty($dni)){echo $dni;} ?>" id="dni" type="number" placeholder="N° DNI" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="position-relative form-group"><label  class="">Nombres</label>
                                                        <input name="nombres" disabled=»disabled» value="<?php if(!empty($dni)){echo $nombres;} ?>" id="nombres" placeholder="Ingrese los nombres" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="position-relative form-group"><label  class="">Apellidos</label>
                                                         <input name="apellidos" disabled=»disabled» value="<?php if(!empty($dni)){echo $apellidos;} ?>" id="apellidos" placeholder="Ingrese los apellidos" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                <div class="col-md-2"></div>
                            </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Tipo</th>
                                                <th>Asunto y Area</th>
                                                <th class="text-center">Fecha</th>
                                                <th class="text-center">Estado</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php while($fila= $statement->fetch()){
                                                $idDoc=$fila['idExp'];
                                                $idtipoExp=$fila['idTipoExp'];
                                                $tipoExp=$nuevo->obtenerTipoExp($con,$idtipoExp);
                                                $asunto=$fila['asuntoExp'];
                                                $idarea=$fila['idArea'];
                                                $nomArea=$nuevo->obtenerdescarea($con,$idarea);
                                                $fecha=$fila['fechaExp'];
                                                $idestado=$fila['idEstado'];
                                                $estadoDoc=$nuevo->obtenerNomEstado($con,$idestado);
                                                ?>
                                            <tr>
                                                <td class="text-center text-muted"><?php echo $idDoc;?></td>
                                                <td class="text-center"><?php echo $tipoExp;?></td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading"><?php echo $asunto;?></div>
                                                                <div class="widget-subheading opacity-7"><?php echo $nomArea;?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center"><?php echo $fecha;?></td>
                                                <td class="text-center">
                                                    <div class="badge <?php switch($estadoDoc){
                                                        case "Nuevo":
                                                            echo "badge-warning";
                                                            break;
                                                        case "Abierto":
                                                            echo "badge-danger";
                                                            break;
                                                        case "Completado":
                                                            echo "badge-success";
                                                            break;
                                                    }?>"><?php echo $estadoDoc;?></div>
                                                </td>
                                                <td class="text-center">
                                                <a href="expedienteVer.php?idDoc=<?php echo $idDoc?>&e=<?php if(isset($e)){echo $e;}?>" class="btn btn-primary btn-sm order-submit ">Detalles</a>
                                                </td>
                                            </tr>
                                            <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-block text-center card-footer">
                                        <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                        <a href="usuarioBuscar.php?iduser=<?php echo $iduser;?>" class="btn-wide btn btn-success">Volver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
<!-- Fin de la tbla-->
                          </div>

                      </div>
                    </div>
              </div>
        </div>
    </div>
    <?php if(isset($_GET['idDoc'])){ echo $script;} ?>

<script type="text/javascript" src="../Views/assets/scripts/main.js"></script>
</body>
</html>

<!-- MODAL -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalles del expediente <?php echo $nExp; ?></h5>
                <a href="expedienteVer.php?iduser=<?php echo $id;?>&e=<?php echo $e; ?>" type="button" class="close"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
            <p><?php echo $detalle; ?></p>
            <p><?php echo "Ahora está en: ".$areaAct; ?></p>
            </div>
            <div class="modal-footer">
                <a href="expedienteVer.php?iduser=<?php echo $id;?>&e=<?php echo $e; ?>" type="button" class="btn btn-primary">Aceptar</a>
            </div>
        </div>
    </div>
</div>

<!-- FIN MODAL-->

