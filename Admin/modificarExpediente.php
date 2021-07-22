<?php session_start();

include_once '../Funciones.php';

$nuevo= new Conexion();
$user =$_SESSION['usuario'];
$con =$nuevo->conectar();
$listado= $nuevo->roles($con,$user);

$area=$listado['nomArea'];
$rol=$listado['rol'];

$nExp="";

if(isset($_POST['idDoc'])){
  $nExp=$_POST['idDoc'];
  $nExpAntes=$_POST['nExpAntes'];
  $asunto=$_POST['Asunto'];
  $fecha=$_POST['fecha'];
  $nomArea=$_POST['nomArea'];
  $idarea=$nuevo->obteneridarea($con,$nomArea);
  $result=$nuevo->modificarexp($con,$nExp,$fecha,$asunto,$idarea,$nExpAntes);
  if($result){
    $error="<div class='text-center'> Modificado Exitosamente</div>";
  }else{$error="<div class='text-center'>No se puede modificar porque ya existe el numero de expediente</div>";}
    
}


if(isset($_POST['nExp'])){
    $nExp=$_POST['nExp'];
}
$resultado=$nuevo->buscarExp($con,$nExp);
$fila= $resultado->fetch();
$salida="";
if($fila){
    $idDoc=$fila['idExp'];
    $id=$fila['idUser'];
    $asunto=$fila['asuntoExp'];
    $fecha = $fila['fechaExp'];
    $idarea =$fila['idArea'];
    $nomArea=$nuevo->obtenerdescarea($con,$idarea);

    $salida .= "
    <div class='row'>
      <div class='col-md-2'>
      </div>
      <div class='class-md-8'>
        <div class='main-card mb-3 card'>
          <div class='card-body'>
            <div>
              <form name='datos' method='POST' action='modificarExpediente.php'>
                <div class='form-row'>
                  <div class='col-md-3'>
                  <input name='nExpAntes' id='nExpAntes' value='".$idDoc."' type='hidden'>
                    <div class='position-relative form-group'><label  class=''>N° Expediente</label>
                      <input name='idDoc'  id='idDoc' value='".$idDoc."'type='text' class='form-control text-center'>
                    </div>
                  </div>
                  <div class='col-md-5'>
                    <div class='position-relative form-group'><label  class=''>Asunto</label>
                      <input name='Asunto'  id='asunto' value= '".$asunto."' type='text' class='form-control'>
                     </div>
                  </div>
                  <div class='col-md-4'>
                      <div class='position-relative form-group'><label  class=''>Fecha</label>
                        <input name='fecha'  id='fecha' value= '".$fecha."' type='text' class='form-control'>
                      </div>
                  </div>
                </div>
                <div class='form-row'>
                  <div class='col-md-12'>
                    <div class='position-relative form-group'>
                      <label for='examplePassword11' class=''>Area</label>
                      <input name='nomArea' id='nomArea' value= '".$nomArea."' type='text' class='form-control'>
                    </div>
                  </div>
                </div>
                <div class='form-row'>
                  <div class='col-md-4'></div>
                    <div class='col-md-4'>
                      <div class='text-center'>
                        <button type='submit' class='mt-2 btn btn-primary'>Modificar</button> 
                      </div>
                    </div>
                  <div class='col-md-4'></div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class='col-md-2'>
      </div>
    </div>";
  }else {
    $salida.="<div class='text-center'>El expediente no existe</div>";
  }


if(isset($_SESSION['usuario'])){
  require 'Views/modificarExpediente.view.php';
}else{
  header('Location: ../Login.php');
}

 ?>
