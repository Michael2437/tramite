<?php session_start();


include_once '../Funciones.php';
date_default_timezone_set('America/Lima');
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
    $detalle =$result['detalle'];
    $nuevo->cambioestado($con,$id);
}

 if(isset($_POST['selectArea'])){
  $nExp=$_POST['nExp'];
  $idselectArea =$_POST['selectArea'];
  $selectArea=$nuevo->obtenerdescarea($con,$idselectArea);
  $mensaje=$_POST['mensaje'];
  $fecha = date("Y-m-d H:i:s"); 

  $result=$nuevo->expIdDoc($con,$nExp);
  $detalle =$result['detalle'];
  $detalle .="<br>Derivado el: ".$fecha.". De: ".$area." A: ".$selectArea;
  $derivado=$nuevo->derivar($con,$area,$idselectArea,$mensaje,$nExp);
  $nuevo->detalle($con,$detalle,$nExp);
  $script="<script>
  $( document ).ready(function() {
      $('#myModal').modal('toggle')
  });
  </script>";
}

if(isset($_SESSION['usuario'])){
    require 'Views/expedienteDerivar.view.php';
  }else{
    header('Location: ../Login.php');
  }
?>  