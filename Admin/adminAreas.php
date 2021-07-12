<?php session_start();

include_once '../Funciones.php';

$nuevo= new Conexion();
$user =$_SESSION['usuario'];
$con =$nuevo->conectar();
$listado= $nuevo->roles($con,$user);

$area=$listado['nomArea'];
$rol=$listado['rol'];

$areas=$nuevo->MostrarAreas($con);


if(isset($_SESSION['usuario'])){
  require 'Views/adminAreas.view.php';
}else{
  header('Location: ../Login.php');
}

 ?>
