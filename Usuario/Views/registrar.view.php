<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Expediente</title>
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
                            <div class="page-title-heading ">
                                <div>Registro
                                    <div class="page-title-subheading">Registre su documento para procesar
                                    </div>
                                </div>
                            </div> 
                        </div> 
                        <div class="tab-content">
                            <div class="main-card mb-3 card ">
                                <div class="card-body text-center">
                                    <h5 class="card-title ">Expediente</h5>
                                    <form class="" action="buscarDNI.php" method="POST">
                                        <div class="position-relative form-group">
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="position-relative form-group">
                                                        <label for="">DNI</label>
                                                        <input name="dni" id="dni" placeholder="Ingrese el Número de DNI" type="number" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="position-relative form-group">
                                                        <label for="">Nombres</label>
                                                        <input name="nombre" id="nombres" placeholder="Nombres" type="text" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="position-relative form-group">
                                                        <label for="">Apellidos</label>
                                                        <input name="apellidos" id="apellidos" placeholder="Apellidos" type="text" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="">Direccion</label>
                                                        <input name="direccion" id="direccion" placeholder="Dirección" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="">Correo Electrónico</label>
                                                        <input name="correo" id="correo" placeholder="E-mail" type="email" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="mt-1 btn btn-primary ">Buscar</button>
                                    </form>
                                </div>
                            </div>
                            <div class="mt-2">
                                <a href="index.php" class="btn btn-primary">Volver</a>
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