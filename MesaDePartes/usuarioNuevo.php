<?php session_start();

include_once '../Funciones.php';
$nuevo= new Conexion();

$user =$_SESSION['usuario'];
$con =$nuevo->conectar();
$listado= $nuevo->roles($con,$user);

$area=$listado['nomArea'];
$rol=$listado['rol'];

$salida="";

if (isset($_POST['dni'])) {
  $dni = $_POST['dni'];
  $nombres = $_POST['nombres'];
  $apellidos = $_POST['apellidos'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  $correo=$_POST['correo'];
  $tipouser=$_POST['tipo'];
  if($tipouser=="Normal"){
    $ruc=""; $razonsocial="";
  } else{
    $ruc=$_POST['ruc']; $razonsocial=$_POST['razonsocial'];
  }
  $error = '';
 
  $validacion=$nuevo->validardni($con,$dni);
  if ($validacion != false) {
    $error .= '<p>El DNI ya fue registrado anteriormente</p>';
  } else {
    $nuevo->registrouser($con,$dni,$nombres,$apellidos,$direccion,$telefono,$correo,$tipouser,$ruc,$razonsocial);
    $error .= '<p>Registrado correctamente</p>';
  }
}

if (isset($_SESSION['usuario'])) {
  require 'Views/usuarioNuevo.view.php';
} else {
  header('Location: ../Login.php');
}
?>