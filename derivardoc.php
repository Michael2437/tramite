<?php session_start();


include_once 'misfunciones.php';

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
    $nuevo->cambioestado($con,$id);
}
if(isset($_POST['selectArea'])){
$selectArea =$_POST['selectArea'];
$nuevo->derivar($con,$area,$selectArea,$id);}
if(isset($_SESSION['usuario'])){
    require 'views/derivardoc.view.php';
  }else{
    header('Location: login.php');
  }
?>