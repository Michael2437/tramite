<?php
include_once '../Funciones.php';

$nuevo=new Conexion();
$con=$nuevo->conectar();

if(isset($_POST['nExp'])){
    $nExp=$_POST['nExp'];
    $resultado=$nuevo->buscarExp($con,$nExp);
    
    $fila=$resultado->fetch();
    if($fila){
    $idDoc=$fila['idDoc'];
    $asunto=$fila['Asunto'];
    $areaA=$fila['nomArea'];
    }
}

if(isset($_POST['idD'])){
    $nExp=$_POST['idD'];
    $resultado=$nuevo->buscarExp($con,$nExp);
    
    $fila=$resultado->fetch();
    if($fila){
    $idDoc=$fila['idDoc'];
    $asunto=$fila['Asunto'];
    $areaA=$fila['nomArea'];
    $detalle=$fila['detalleExp'];
    }
    $script="<script>
    $( document ).ready(function() {
        $('#verDetalle').modal('toggle')
    });
    </script>";
}
require 'Views/Expediente.view.php';
?>