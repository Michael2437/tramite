<?php session_start();

include_once '../Funciones.php';

$nuevo= new Conexion();
$user =$_SESSION['usuario'];
$con =$nuevo->conectar();
$listado= $nuevo->roles($con,$user);

$area=$listado['nomArea'];
$rol=$listado['rol'];


$tdoc=$con->prepare('SELECT COUNT(*) FROM `documento`');
$tdoc->execute();
$total = $tdoc->fetchColumn();


if(isset($_SESSION['usuario'])){
  require 'Views/indexAdmin.view.php';
}else{
  header('Location: ../Login.php');
}

 ?>
