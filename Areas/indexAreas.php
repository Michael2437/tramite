<?php session_start();

include_once '../Funciones.php';
date_default_timezone_set('America/Lima');
   
$nuevo= new Conexion();
$user =$_SESSION['usuario'];
$con =$nuevo->conectar();
$listado= $nuevo->roles($con,$user);

$area=$listado['nomArea'];
$rol=$listado['rol'];
$consulta=$nuevo->expArea($con,$area);

$fechaactual = date("Y-m-d H:i:s"); 

if(isset($_GET['e'])){
  $e=$_GET['e'];
  $class="active";
  if($e==1){
    $consulta=$nuevo->expArea($con,$area);
  }else{
  $consulta=$nuevo->filtrarexpArea($con,$e,$area);}
}
if(isset($_GET['idDoc'])){
  $idDocu=$_GET['idDoc'];

  $resultado=$nuevo->expIdDoc($con,$idDocu);
  $detalle=$resultado['detalleExp'];
  $nomArea=$resultado['nomArea'];
  $script="
  <script>
  $( document ).ready(function() {
      $('#myModal').modal('toggle')
  });
  </script>";
}

if(isset($_SESSION['usuario'])){
    require 'Views/indexAreas.view.php';
  }else{
    header('Location: ../Login.php');
  }
?>