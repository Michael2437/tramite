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
                                        <form class="" action="registrar.php" method="POST" enctype="multipart/form-data">
                                            <div class="position-relative form-group">
                                                <div class="form-row">
                                                    <div class="col-md-2">
                                                        <div class="position-relative form-group">
                                                            <label for="">DNI</label>
                                                            <input type="hidden" name="iduser" id="iduser" value="">
                                                            <input name="dni" id="dni" placeholder="N° DNI" type="number" class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="position-relative form-group">
                                                            <label for="">Nombres</label>
                                                            <input name="nombre" id="nombres" placeholder="Nombres" type="text" class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="position-relative form-group">
                                                            <label for="">Apellidos</label>
                                                            <input name="apellidos" id="apellidos" placeholder="Apellidos" type="text" class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-8">
                                                        <div class="position-relative form-group">
                                                            <label for="">Direccion</label>
                                                            <input name="direccion" id="direccion" placeholder="Dirección" type="text" class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="">Teléfono</label>
                                                            <input name="telefono" id="telefono" placeholder="Telefono" type="number" class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-8">
                                                        <div class="position-relative form-group">
                                                            <label for="">Correo Electrónico</label>
                                                            <input name="correo" id="correo" placeholder="E-mail" type="email" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="">Tipo de Usuario</label>
                                                            <select class="form-control" id="tipo" name="tipo" onchange="buscar_archivos()" type="select">
                                                            <option></option>
                                                                <option value="1">Normal</option>
                                                                <option value="2">Juridico</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id ="selectorder"></div>
                                                <div class="form-row">
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <label for="">Tipo de Expediente</label>
                                                            <select name="tipExp" id="tipExp" type="text" class="form-control">
                                                                <option></option>
                                                             <?php while($fila=$listaTipo->fetch()){  ?> 
                                                                <option value="<?php echo $fila['idTipoExp'];?>"><?php echo $fila['descTipoExp'];?></option>
                                                            <?php }
                                                               ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <label for="">Área de recepción</label>
                                                            <select name="nomArea" id="nomArea" type="text" class="form-control">
                                                                <option></option>
                                                            <?php while($selectArea=$listaArea->fetch()){?>
                                                                <option value="<?php echo $selectArea['idArea'];?>"><?php echo $selectArea['nomArea'];?></option>
                                                             <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group">
                                                            <label for="">Asunto</label>
                                                            <input name="asunto" id="asunto" placeholder="Ingrese asunto" type="text" class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                <input name="userfile" type="file" id="userfile" required> 
                                                </div>
                                            </div>
                                            <button type="submit" class="mt-1 btn btn-primary ">Registrar</button>
                                            <a href="index.php" class="mt-1 btn btn-primary">Volver</a>
                                        </form>
                                    </div>
                                    
                                </div>
                                <div class="mt-2"></div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
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