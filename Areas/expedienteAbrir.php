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


$id="";
if(isset($_GET['idDoc'])){
    $id=$_GET['idDoc'];
    $result=$nuevo->expIdDoc($con,$id);

    $idDoc=$result['idDoc'];
    $remitente=$result['remitente'];
    $tipoExp=$result['tipoExp'];
    $asunto=$result['Asunto'];
    $mensaje=$result['mensaje'];
    
    $estadoDoc=$result['estadoExp'];

    if($estadoDoc=="Nuevo"){
    $nuevo->cambioestado($con,$id);}

}


if(isset($_SESSION['usuario'])){
    require 'Views/expedienteAbrir.view.php';
  }else{
    header('Location: ../Login.php');
  }
?>