<?php session_start();


include_once 'misfunciones.php';
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
    $id=$_GET['idDoc'];
    $result=$nuevo->expIdDoc($con,$id);

    $idDoc=$result['idDoc'];
    $detalle =$result['detalleExp'];
    $nuevo->cambioestado($con,$id);
}
if(isset($_POST['selectArea'])){
$selectArea =$_POST['selectArea'];
$mensaje=$_POST['mensaje'];
$fecha = date("Y-m-d H:i:s"); 
$detalle .="Derivado el: ".$fecha.". De: ".$area." A: ".$selectArea."\n";
$nuevo->derivar($con,$area,$selectArea,$mensaje,$id);
$nuevo->detalle($con,$detalle,$idDoc);
}
if(isset($_SESSION['usuario'])){
    require 'views/derivardoc.view.php';
  }else{
    header('Location: login.php');
  }
?>