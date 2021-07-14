<?php
include_once '../Funciones.php';

$nuevo=new Conexion();
$con=$nuevo->conectar();
$iduser="";
$dni="";
$error="";
if(isset($_POST['dni'])){
    $dni=$_POST['dni'];
    $datos=$nuevo->buscaruser($con,$dni,$iduser);
    if($datos){
    $iduser=$datos['iduser'];
    $resultado=$nuevo->mostrarexp($con,$iduser);
    }else {
        $error.="<div class='text-center'>El DNI no está registrado</div>";
    }
}

if(isset($_POST['idDoc'])){
    $idDoc=$_POST['idDoc'];
    $datos=$nuevo->buscarExp($con,$idDoc);
    $fila=$datos->fetch();
    $iduser=$fila['iduser'];

    $resultado=$nuevo->mostrarexp($con,$iduser);
}

if(isset($_POST['idmodal'])){
    $idmodal=$_POST['idmodal'];
    $datos=$nuevo->buscarExp($con,$idmodal);
    $fi=$datos->fetch();
    $detalle=$fi['detalleExp'];
    $iduser=$fi['iduser'];

    $resultado=$nuevo->mostrarexp($con,$iduser);
    $script="<script>
    $( document ).ready(function() {
        $('#verDetalle').modal('toggle')
    });
    </script>";
}


require 'Views/buscarDNI.view.php';
?>