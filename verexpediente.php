<?php session_start();

include_once 'misfunciones.php';

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


if(isset($_SESSION['usuario'])){
  require "views/verexpediente.view.php";
} else {
  header('Location: login.php');
}


 ?>
