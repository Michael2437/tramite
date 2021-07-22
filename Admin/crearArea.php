<?php session_start();

include_once '../Funciones.php';

$nuevo= new Conexion();
$user =$_SESSION['usuario'];
$con =$nuevo->conectar();
$listado= $nuevo->roles($con,$user);

$area=$listado['nomArea'];
$rol=$listado['rol'];

if(isset($_POST['nomArea'])){
  $nomArea=$_POST['nomArea'];
  $pass=$_POST['pass'];
  $passCon=$_POST['passCon'];

  if($pass ==$passCon){
    $resultado=$nuevo->crearArea($con,$nomArea,$pass);
    // if($resultado){
    //   $nuevo->crearListadoArea($con,$nomArea);
    //   }
    }
    
}


if(isset($_SESSION['usuario'])){
  require 'Views/crearArea.view.php';
}else{
  header('Location: ../Login.php');
}

 ?>
