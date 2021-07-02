<?php session_start();
include_once 'misfunciones.php';

$nuevo=new Conexion();
$user=$_SESSION['usuario'];
$con=$nuevo->conectar();
$listado=$nuevo->roles($con,$user);
$area=$listado['nomArea'];
$rol=$listado['rol'];

$nExp="";
if(isset($_POST['nExp'])){
    $nExp=$_POST['nExp'];
}
$resultado=$nuevo->buscarExp($con,$nExp);
$salida="";
if($resultado){
    $idDoc=$resultado['idDoc'];
    $id=$resultado['iduser'];
    $asunto=$resultado['Asunto'];
    $fecha = $resultado['fecha'];
    $nomArea =$resultado['nomArea'];

    $salida .= "<div class='row'>
    <div class='col-md-2'></div>
    <div class='class-md-8'>
    <div class='main-card mb-3 card'>
        <div class='card-body'>
          
          <div>
    <form name='datos' method='post' >
    <div class='form-row'>
      <div class='col-md-3'>
            <div class='position-relative form-group'><label  class=''>N° Expediente</label>
            <input name='idDoc' disabled=»disabled» id='idDoc' value=' ".$idDoc." 'type='text' class='form-control text-center'>
          </div>
      </div>
      <div class='col-md-5'>
          <div class='position-relative form-group'><label  class=''>Asunto</label>
            <input name='Asunto' disabled=»disabled» id='asunto' value= ' ".$asunto." ' type='text' class='form-control'>
          </div>
      </div>
      <div class='col-md-4'>
          <div class='position-relative form-group'><label  class=''>Fecha</label>
            <input name='fecha' disabled=»disabled» id='fecha' value= ' ".$fecha." ' type='text' class='form-control'>
          </div>
      </div>
    </div>
    <div class='form-row'>
      <div class='col-md-12'>
        <div class='position-relative form-group'>
          <label for='examplePassword11' class=''>Area</label>
          <input name='nomArea' disabled=»disabled» id='nomArea' value= ' ".$nomArea." ' type='text' class='form-control'>
        </div>
      </div>
    </div>
    <div class='form-row'>
    <div class='col-md-4'></div>
      <div class='col-md-4'>
        <div class='text-center'>
        <a href='verexpediente.php?iduser=". $id." ' class='mt-2 btn btn-primary'>Ver Expediente</a>
          
        </div>
      </div>
      <div class='col-md-4'></div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    <div class='col-md-2'></div>
    </div>";
  }else {
    $salida.="<div class='text-center'>El expediente no existe</div>";
  }

if(isset($_SESSION['usuario'])){
    require "views/buscarexpediente.view.php";
}else{
    header('Location:login.php');
}
?>