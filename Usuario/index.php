<?php
include_once '../Funciones.php';

$nuevo=new Conexion();
$con=$nuevo->conectar();


require 'Views/index.view.php';
?>