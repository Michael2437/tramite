<?php session_start();

include_once '../Funciones.php';

$nuevo= new Conexion();
$user =$_SESSION['usuario'];
$con =$nuevo->conectar();
$listado= $nuevo->roles($con,$user);

$area=$listado['nomArea'];
$rol=$listado['rol'];

$areas=$nuevo->tipoExp($con);

if(isset($_POST['tipExp'])){
    $tipExp=$_POST['tipExp'];
    $resultado=$nuevo->nuevoTexp($con,$tipExp);
    $script="<script>
    $( document ).ready(function() {
        $('#Confirmar').modal('toggle')
    });
    </script>";
}

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $eliminar=$nuevo->eliminarTexp($con,$id);
    $script="<script>
    $( document ).ready(function() {
        $('#Eliminar').modal('toggle')
    });
    </script>";
}


if(isset($_SESSION['usuario'])){
  require 'Views/crearTexpediente.view.php';
}else{
  header('Location: ../Login.php');
}

 ?>
