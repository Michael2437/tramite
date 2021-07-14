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
                                        <div>Expedientes del DNI: 
                                            <div class="page-title-subheading">DNI seleccionado, o no encontrado
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
                                                <?php while($fila=$resultado->fetch()){
                                                        $nExp=$fila['idDoc'];
                                                        $asunto=$fila['Asunto'];
                                                        $areaA=$fila['nomArea'];
                                                    ?>
                                                <tr>
                                                    <th><?php echo $nExp;?></th>
                                                    <th><?php echo $asunto;?></th>
                                                    <th><?php echo $areaA;?></th>
                                                    <th><a href="#" id="<?php echo $nExp;?>"  data-toggle="modal" data-target="#exampleModal" class="btn btn-primary abrirmodal">Ver detalle</a></th>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                                <a href="index.php" class="btn btn-primary">Volver</a>
                            </div>
                            <div class="col-md-1"></div>
                            
                        </div>         
                        
                    </div>
        </div>
    </div>      
</div>
<script>


$(".abrirmodal").click(function() {
  //Capturamos el valor del id para enviarlo al modal
  let id_plan = $(this).attr('id');
  $("input#idmodal").val(id_plan);
});

</script>
 <?php if(isset($script)){echo $script;}?>
<script type="text/javascript" src="../Views/assets/scripts/main.js"></script></body>

</body>
</html>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ver detalle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <Form action="buscarDNI.php" name="ver" method="POST">
                <input type="hidden" id="idmodal" name="idmodal" value="">
                
                <button type="submit" onclick="ver.submit()" class="btn btn-primary">Ver</button>
            </Form>
            </div>
        </div>
    </div>
</div>
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