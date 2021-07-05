<?php session_start();


include_once 'misfunciones.php';

$nuevo= new Conexion();
$user =$_SESSION['usuario'];
$con =$nuevo->conectar();
$listado= $nuevo->roles($con,$user);

$area=$listado['nomArea'];
$rol=$listado['rol'];
$script="";
$consulta=$nuevo->expArea($con,$area);

if(isset($_POST['idDoc'])){
  $idDoc=$_POST['idDoc'];
  $resultado=$nuevo->expIdDoc($con,$idDoc);
  $detalle=$resultado['detalleExp'];
  
}

if(isset($_SESSION['usuario'])){
    require 'views/area.view.php';
  }else{
    header('Location: login.php');
  }
?>