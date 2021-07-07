<?php session_start();
date_default_timezone_set('America/Lima');

include_once 'misfunciones.php';

   
$nuevo= new Conexion();
$user =$_SESSION['usuario'];
$con =$nuevo->conectar();
$listado= $nuevo->roles($con,$user);

$area=$listado['nomArea'];
$rol=$listado['rol'];
$consulta=$nuevo->expArea($con,$area);

$fechaactual = date("Y-m-d H:i:s"); 

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
    require 'views/area.view.php';
  }else{
    header('Location: login.php');
  }
?>