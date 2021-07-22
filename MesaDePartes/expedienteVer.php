<?php session_start();

include_once '../Funciones.php';

$nuevo= new Conexion();
$user =$_SESSION['usuario'];
$con =$nuevo->conectar();
$listado= $nuevo->roles($con,$user);

$area=$listado['nomArea'];
$rol=$listado['rol'];

if(isset($_GET['iduser'])){
  $iduser= $_GET['iduser'];
  $e=$_GET['e'];
  $class="active";
  if($e==1){
    $statement=$nuevo->mostrarexp($con,$iduser);
  }else {
    $statement=$nuevo->filtrarexpUser($con,$e,$iduser);
  }
  
  $dni="";
  $resultado = $nuevo->buscaruser($con,$dni,$iduser);

  $dni=$resultado['dni'];
  $nombres=$resultado['nomUser'];
  $apellidos=$resultado['apeUser'];
}
if(isset($_GET['idDoc'])){
  $e=$_GET['e'];
  $idDoc=$_GET['idDoc'];
  $resultado=$nuevo->expIdDoc($con,$idDoc);
  $id=$resultado['idUser'];
  $nExp=$resultado['idExp'];
  $detalle=$resultado['detalle'];
  $idarea=$resultado['idArea'];
  $areaAct=$nuevo->obtenerdescarea($con,$idarea);

  $statement = $nuevo->mostrarexp($con,$id);
  $script="
  <script>
  $( document ).ready(function() {
      $('#myModal').modal('toggle')
  });
  </script>";
}



if(isset($_SESSION['usuario'])){
  require "Views/expedienteVer.view.php";
} else {
  header('Location: ../Login.php');
}


 ?>
