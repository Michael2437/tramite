<?php session_start();


date_default_timezone_set('America/Lima');
include_once '../Funciones.php';
$fechaactual = date("Y-m-d H:i:s"); 
$nuevo= new Conexion();
$user =$_SESSION['usuario'];
$con =$nuevo->conectar();
$listado= $nuevo->roles($con,$user);

$area=$listado['nomArea'];
$rol=$listado['rol'];

$listaArea=$nuevo->selectArea($con);

$id="";
if(isset($_GET['idDoc'])){
    $page=$_GET['page'];
    $e=$_GET['e'];
    $id=$_GET['idDoc'];
    $result=$nuevo->expIdDoc($con,$id);

    $idDoc=$result['idExp'];
    $asunto=$result['asuntoExp'];
    $detalle =$result['detalle'];
    $nuevo->cambioestado($con,$id);
}
 if(isset($_POST['nExp'])){
  $nExp=$_POST['nExp'];
  $mensaje=$_POST['detalle'];
  
  $result=$nuevo->expIdDoc($con,$nExp);
  $detalle =$result['detalle'];
  $detalle.="Completado el: ".$fechaactual."<br>".$mensaje;
  $completado=$nuevo->estadocompleto($con,$nExp,$detalle);

  $script="<script>
  $( document ).ready(function() {
      $('#myModal').modal('toggle')
  });
  </script>";
}



if(isset($_SESSION['usuario'])){
    require 'Views/expedienteConcluir.view.php';
  }else{
    header('Location: ../Login.php');
  }
?>