<?php session_start();

include_once 'misfunciones.php';

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
  require 'views/contenido.view.php';
}else{
  header('Location: login.php');
}

 ?>
