<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Views/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  
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
                                        <div>Expediente
                                            <div class="page-title-subheading">Expediente seleccionado, o no encontrado
                                            </div>
                                        </div>
                                    </div> 
                                </div>   
                                <div class="main-card mb-3 card">
                                    <div class="card-body">  
                                        <table class="mb-0 table">
                                            <thead>
                                                <tr>
                                                    <th>N° Expediente</th>
                                                    <th>Asunto</th>
                                                    <th>Area Actual</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr> <?php if(isset($idDoc)){?>
                                                    <th><?php echo $idDoc;?></th>
                                                    <th><?php echo $asunto;?></th>
                                                    <th><?php echo $areaA;?></th>
                                                    <th><form action="Expediente.php" method="POST" name="exp">
                                                        <input type="hidden" value="<?php echo $idDoc;?>" id="idD" name="idD">
                                                        <button type="submit" onclick="exp.submit()" class="btn btn-primary">Detalle</button> 
                                                    </form>
                                                    </th><?php } ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                                <?php if(!empty($error)){
                                    echo $error;
                                } ?>
                                <form action="buscarDNI.php" method="POST" name="dni">
                                    <input type="hidden" name="idDoc" id="idDoc" value="<?php echo $idDoc; ?>">
                                </form>
                                <a href="index.php" class="btn btn-primary">Volver</a>
                                <button type="submit" onclick="dni.submit()" class="btn btn-primary">Ver más</button>
                                </div>
                            <div class="col-md-1"></div>
                            
                        </div>         
                        
                    </div>
        </div>
    </div>      
</div>

<?php if(isset($script)){echo $script;}?>
<script type="text/javascript" src="../Views/assets/scripts/main.js"></script>
</body>
</html>

<div class="modal fade" id="verDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><?php echo $detalle;?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>