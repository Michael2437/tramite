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
  $error = '';
 
  $validacion=$nuevo->validardni($con,$dni);
  if ($validacion != false) {
    $error .= '<p>El DNI ya fue registrado anteriormente</p>';
  } else {
    $nuevo->registrouser($con,$dni,$nombres,$apellidos,$direccion,$telefono);
    $error .= '<p>Registrado correctamente</p>';
  }
}

if(isset($_POST['consulta'])){
  $consulta = $_POST['consulta'];
      if($consulta=="Jurídico"){
        $salida.="<div class='form-row'>
        <div class='col-md-6'>
          <div class='position-relative form-group'><label for='exampleAddress' class=''>RUC</label>
          <input name='ruc' id='ruc' placeholder='Ingrese RUC' type='text' class='form-control'>
          </div>
        </div>
        <div class='col-md-6'>
          <div class='position-relative form-group'><label for='exampleAddress2' class=''>Razón Social</label>
            <input name='razonsocial' id='razonsocial' placeholder='Ingrese razón social' type='text' class='form-control'>
          </div>
        </div>
      </div>";
      }
   echo $salida;
}


if (isset($_SESSION['usuario'])) {
  require 'Views/usuarioNuevo.view.php';
} else {
  header('Location: ../Login.php');
}
?>