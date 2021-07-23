<?php
include_once '../Funciones.php';

$nuevo=new Conexion();
$con=$nuevo->conectar();

$error="";
if(isset($_POST['nExp'])){
    $nExp=$_POST['nExp'];
    $resultado=$nuevo->buscarExp($con,$nExp);
    
    $fila=$resultado->fetch();
        if($fila){
        $idDoc=$fila['idExp'];
        $asunto=$fila['asuntoExp'];
        $idarea=$fila['idArea'];
        $areaA=$nuevo->obtenerdescarea($con,$idarea);
        }
    else{
        $error.="<div class='text-center'>El expediente NO está registrado</div>";
    }
}

if(isset($_POST['idD'])){
    $nExp=$_POST['idD'];
    $resultado=$nuevo->buscarExp($con,$nExp);
    
    $fila=$resultado->fetch();
    if($fila){
    $idDoc=$fila['idExp'];
    $asunto=$fila['asuntoExp'];
    $idarea=$fila['idArea'];
    $areaA=$nuevo->obtenerdescarea($con,$idarea);
    $detalle=$fila['detalle'];
    }
    $script="<script>
    $( document ).ready(function() {
        $('#verDetalle').modal('toggle')
    });
    </script>";
}
require 'Views/Expediente.view.php';
?>