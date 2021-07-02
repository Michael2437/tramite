<?php session_start();

include_once 'misfunciones.php';
$nuevo= new Conexion();

$user =$_SESSION['usuario'];
$con =$nuevo->conectar();
$listado= $nuevo->roles($con,$user);

$area=$listado['nomArea'];
$rol=$listado['rol'];

if (isset($_POST['dni'])) {
  $dni = $_POST['dni'];
  $nombres = $_POST['nombres'];
  $apellidos = $_POST['apellidos'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  $error = '';
 
  $validacion=$nuevo->validardni($con,$dni);
  if ($validacion != false) {
    $error .= '<p>El DNI ya fue registrado anteriormente</p>';
  } else {
    $nuevo->registrouser($con,$dni,$nombres,$apellidos,$direccion,$telefono);
    $error .= '<p>Registrado correctamente</p>';
  }
}

if (isset($_SESSION['usuario'])) {
  require 'views/newuser.view.php';
} else {
  header('Location: login.php');
}
?>