<?php session_start();
include_once 'Funciones.php';
$nuevo= new Conexion();
if(isset($_SESSION['usuario'])){
  header('Location: Index.php');
}
$errores ='';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $area = filter_var(strtolower($_POST['area']), FILTER_SANITIZE_STRING);
  $pass = $_POST['contraseña'];

  $con=$nuevo->conectar();
  $resultado=$nuevo->login($con,$area,$pass);
  if($resultado){
  $listado=$resultado->fetch();
  $nomArea=$listado['nomArea'];
  }
  if($resultado !== false){
    $_SESSION['usuario'] = $nomArea;
    header('Location: Index.php');
  }else {
    $errores .= '<p>Datos incorrectos</p>';
  }
}
require 'Views/Login.view.php';
 ?>
