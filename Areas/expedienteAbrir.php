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
    $page=$_GET['page'];
    $e=$_GET['e'];
    $result=$nuevo->expIdDoc($con,$id);

    $idDoc=$result['idExp'];
    $remitente=$result['remitente'];
    $idtipoexp=$result['idTipoExp'];
    $tipoExp=$nuevo->obtenerTipoExp($con,$idtipoexp);
    $asunto=$result['asuntoExp'];
    $mensaje=$result['mensaje'];
    
    $estadoDoc=$result['idEstado'];

    if($estadoDoc=="1"){
    $nuevo->cambioestado($con,$id);}

}


if(isset($_SESSION['usuario'])){
    require 'Views/expedienteAbrir.view.php';
  }else{
    header('Location: ../Login.php');
  }
?>