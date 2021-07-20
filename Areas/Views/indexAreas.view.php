<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $area; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Wide selection of forms controls, using the Bootstrap 4 code base, but built with React.">
    <meta name="msapplication-tap-highlight" content="no">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <link href="../Views/main.css" rel="stylesheet">
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

                                            <a href="../cerrarLogin.php"><button type="button" tabindex="0" class="dropdown-item">Cerrar Sesion</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        <?php echo $area; ?>
                                    </div>
                                    <div class="widget-subheading">
                                        <?php echo $rol; ?>
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
                                <a href="indexAreas.php?page=<?php echo $page;?>&e=<?php echo $e;?>" class="mm-active">
                                    <i class="metismenu-icon pe-7s-rocket"></i>
                                    Principal
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="row">
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-midnight-bloom">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Total de Expedientes</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span> <?php echo $total;?> </span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-arielle-smile">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Los expedientes se muestran de a:</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span><?php echo CANT_EXP;?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-grow-early">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Cantidad de Paginas</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span><?php echo $totalpag;?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-premium-dark">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Products Sold</div>
                                        <div class="widget-subheading">Revenue streams</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-warning"><span>$14M</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">Expedientes
                                    <div class="btn-actions-pane-right">
                                        <label for="">Ver: </label>
                                        <div role="group" class="btn-group-sm btn-group">
                                                <a href="indexAreas.php?page=<?php echo $page;?>&e=1" class="<?php if($e==1){echo $class;}?> btn btn-focus">Todos</a>
                                                <a href="indexAreas.php?page=<?php echo $page;?>&e=2" class="<?php if($e==2){echo $class;}?> btn btn-focus">Completados</a>
                                                <a href="indexAreas.php?page=<?php echo $page;?>&e=3" class="<?php if($e==3){echo $class;}?> btn btn-focus">Nuevos</a>
                                                <a href="indexAreas.php?page=<?php echo $page;?>&e=4" class="<?php if($e==4){echo $class;}?> btn btn-focus">Abiertos</a>
                                            </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Remitente</th>
                                                <th class="text-center">Tipo</th>
                                                <th>Asunto</th>
                                                <th class="text-center">Fecha</th>
                                                <th class="text-center">Estado</th>
                                                <th class="text-center">Proceso</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($result = $consulta->fetch()) {
                                                $idDoc = $result['idDoc'];
                                                $tipoExp = $result['tipoExp'];
                                                $remitente = $result['remitente'];
                                                $asunto = $result['Asunto'];
                                                $fecha = $result['fecha'];

                                                $fecha15dias=date("Y-m-d H:i:s",strtotime($fecha."+ 15 days"));
                                                $fecha30dias=date("Y-m-d H:i:s",strtotime($fecha."+ 1 month"));
                                              
                                                $estadoDoc = $result['estadoExp'];
                                            ?>
                                                <tr>
                                                    <td class="text-center text-muted"><?php echo $idDoc; ?></td>
                                                    <td class="text-center"><?php echo $remitente; ?></td>
                                                    <td class="text-center"><?php echo $tipoExp; ?></td>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">

                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading"><?php echo $asunto; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><?php echo $fecha; ?></td>
                                                    <td class="text-center">
                                                        <div class="badge <?php switch ($estadoDoc) {
                                                                                case "Nuevo":
                                                                                    echo "badge-warning";
                                                                                    break;
                                                                                case "Abierto":
                                                                                    echo "badge-danger";
                                                                                    break;
                                                                                case "Completado":
                                                                                    echo "badge-success";
                                                                                    break;
                                                                            } ?>"><?php echo $estadoDoc; ?></div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="badge 
                                                        <?php if($fecha15dias>$fechaactual && $fechaactual>=$fecha){
                                                            echo "badge-warning";
                                                            $procesoExp="En trámite";
                                                        }else if($fecha30dias>$fechaactual && $fechaactual>= $fecha15dias){
                                                            echo "badge-danger";
                                                            $procesoExp="Por Expirar";
                                                        } elseif($fechaactual>= $fecha30dias){
                                                            echo "badge-info";
                                                            $procesoExp="Expirado";
                                                        }
                                                         ?>"><?php echo $procesoExp; ?></div>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="expedienteAbrir.php?page=<?php echo $page;?>&e=<?php echo $e;?>&idDoc=<?php echo $idDoc?>" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Abrir</a>
                                                        <a href="indexAreas.php?page=<?php echo $page;?>&e=<?php echo $e;?>&idDoc=<?php echo $idDoc?>" class="btn btn-primary btn-sm order-submit ">Detalles</a>
                                                     </td>
                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="d-block text-center card-footer">
                                        <nav class="" aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <?php if($totalpag>1){
                                                    if($page!=1){?>
                                                    <li class="page-item"><a href="indexAreas.php?page=<?php echo ($page-1);if(isset($e)){echo "&e=".$e;} ?>" class="page-link" ><span aria-hidden="true">&laquo;</span></a></li>
                                                    <?php }
                                                    for($i=1;$i<=$totalpag;$i++){
                                                        if($page == $i){
                                                          ?>  <li class="page-item active"><a href="#" class="page-link"><?php echo $page; ?></a></li>
                                                    <?php
                                                        }else{
                                                            ?><li class="page-item"><a href="indexAreas.php?page=<?php echo $i;if(isset($e)){echo "&e=".$e;}?>" class="page-link"><?php echo $i;?></a></li>
                                                
                                                    <?php
                                                        }
                                                    }
                                                        if($page!=$totalpag){
                                                            ?><li class="page-item"><a href="indexAreas.php?page=<?php echo ($page+1);if(isset($e)){echo "&e=".$e;}?>" class="page-link"><span aria-hidden="true">&raquo;</span></a></li> 
                                                            <?php
                                                        }
                                                    
                                                 } ?>
                                                    
                                                 </ul>
                                        </nav>
                                </div>
                            </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Detalles del Expediente N° <?php echo $idDocu;?></h5>
                <a href="indexAreas.php" type="button" class="close"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
            <p><?php echo $detalle; ?></p>
            <p><?php echo "Ahora está en: ".$nomArea; ?></p>
            </div>
            <div class="modal-footer">
                <a href="indexAreas.php?page=<?php echo $page;?>&e=<?php echo $e;?>" type="button" class="btn btn-primary">Aceptar</a>
            </div>
        </div>
    </div>
</div>

<!-- FIN MODAL-->