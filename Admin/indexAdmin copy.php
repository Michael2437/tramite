<?php session_start();

include_once '../Funciones.php';

$nuevo= new Conexion();
$user =$_SESSION['usuario'];
$con =$nuevo->conectar();
$listado= $nuevo->roles($con,$user);

$area=$listado['nomArea'];
$rol=$listado['rol'];




if(isset($_SESSION['usuario'])){
  require 'Views/indexAdmin.view.php';
}else{
  header('Location: ../Login.php');
}

 ?>
