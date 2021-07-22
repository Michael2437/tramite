<?php session_start();

include_once '../Funciones.php';
// Crear nuevo objeto
$nuevo= new Conexion();
// Asignando nombre de area
$user =$_SESSION['usuario'];
// conectando a bd
$con =$nuevo->conectar();
// obteniendo datos de user
$listado= $nuevo->roles($con,$user);
$area=$listado['nomArea'];
$rol=$listado['rol'];

//Contador de expediente para mostrar estadisticas-
// Convertir en función.
$tdoc=$con->prepare('SELECT COUNT(*) FROM `expediente`');
$tdoc->execute();
$total = $tdoc->fetchColumn();


if(isset($_SESSION['usuario'])){
  require 'Views/indexMDP.view.php';
}else{
  header('Location: ../Login.php');
}

 ?>
