<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver expediente</title>
    <link rel="stylesheet" href="../Views/main.css">
</head>
<body>
<div class="container">
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-main">
                    <div class="app-main__inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="app-page-title">
                                    <div class="page-title-wrapper">
                                        <div class="page-title-heading ">
                                            <div>Ver estado de Expediente
                                                <div class="page-title-subheading">Bienvenido!! Seleccione el metodo para buscar
                                                </div>
                                            </div>
                                        
                                        </div>
                                        <div class="page-title-actions">
                                            <div class="d-inline-block dropdown">
                                                <a href="registrar.php" class="btn-shadow btn btn-info">
                                                    Registrar
                                                </a>
                                            </div>
                                        </div> 
                                    </div>
                                </div>    
                                <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                                <li class="nav-item">
                                    <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                        <span>DNI</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                                        <span>N° Expediente</span>
                                    </a>
                                </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                             <div class="main-card mb-3 card ">
                                                    <div class="card-body text-center"><h5 class="card-title ">Buscar por N° de DNI</h5>
                                                        <form class="" action="buscarDNI.php" method="POST">
                                                            <div class="position-relative form-group">
                                                                <input name="dni" id="dni" placeholder="Ingrese el Número de DNI" type="number" class="form-control" autocomplete="off">
                                                            </div>
                                                            <button class="mt-1 btn btn-primary ">Buscar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            
                                    </div>
                                    <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
                                      <div class="main-card mb-3 card">
                                                    <div class="card-body text-center">
                                                        <h5 class="card-title">Buscar por N° de Expediente</h5>
                                                        <form class="expediente" action="Expediente.php" method="POST">
                                                            <div class="position-relative form-group">
                                                                <input name="nExp" id="nExp" placeholder="Ingrese el Número de Expediente" type="number" class="form-control" autocomplete="off">
                                                            </div>
                                                            <button class="mt-1 btn btn-primary">Buscar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>         
                        
                    </div>
        </div>
    </div>      
</div>
<script type="text/javascript" src="../Views/assets/scripts/main.js"></script></body>

</body>
</html>