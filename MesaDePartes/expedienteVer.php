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
  $dni="";
  $statement = $nuevo->mostrarexp($con,$iduser);
  $resultado = $nuevo->buscaruser($con,$dni,$iduser);

  $dni=$resultado['dni'];
  $nombres=$resultado['nomUsuario'];
  $apellidos=$resultado['apeUsuario'];
}
if(isset($_GET['idDoc'])){
  $idDoc=$_GET['idDoc'];
  $resultado=$nuevo->expIdDoc($con,$idDoc);
  $id=$resultado['iduser'];
  $detalle=$resultado['detalleExp'];
  $areaAct=$resultado['nomArea'];

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
