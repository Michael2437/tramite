<?php session_start();

include_once '../Funciones.php';

$nuevo= new Conexion();
$user =$_SESSION['usuario'];
$con =$nuevo->conectar();
$listado= $nuevo->roles($con,$user);

$area=$listado['nomArea'];
$rol=$listado['rol'];

if(isset($_GET['id'])){
  $id=$_GET['id'];
  $selectarea=$nuevo->selectAreas($con,$id);
  $nomArea=$selectarea['nomArea'];
  $idArea=$selectarea['idArea'];
}

if(isset($_POST['nomArea'])){
  $areamod= $_POST['nomArea'];
  $idArea=$_POST['idArea'];
  $pass=$_POST['pass'];
  $passCon=$_POST['passCon'];

  $selectarea=$nuevo->selectAreas($con,$idArea);
  $nomArea=$selectarea['nomArea'];
  if($pass==$passCon){
    $nuevo->modificarListadoArea($con,$areamod,$nomArea);
    $resultado=$nuevo->modificarArea($con,$areamod,$pass,$idArea);
  }
  $script="<script>
    $( document ).ready(function() {
        $('#myModal').modal('toggle')
    });
    </script>";
}

if(isset($_SESSION['usuario'])){
  require 'Views/modificarArea.view.php';
}else{
  header('Location: ../Login.php');
}

 ?>
