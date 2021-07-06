<?php session_start();


include_once 'misfunciones.php';

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

if(isset($_POST['remitente'])){
  $nExp=$_POST['nExp'];
  $result=$nuevo->expIdDoc($con,$nExp);
  $detalle =$result['detalleExp'];
  $detalle.="Completado el: ".$fechaactual;
  $completado=$nuevo->estadocompleto($con,$nExp,$detalle);
}


if(isset($_SESSION['usuario'])){
    require 'views/abrirdoc.view.php';
  }else{
    header('Location: login.php');
  }
?>