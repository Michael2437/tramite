<?php session_start();

include_once '../Funciones.php';

$nuevo= new Conexion();
$user =$_SESSION['usuario'];
$con =$nuevo->conectar();
$listado= $nuevo->roles($con,$user);

$area=$listado['nomArea'];
$rol=$listado['rol'];

$iduser= $_GET['iduser'];
if($_SERVER['REQUEST_METHOD']=='POST'){
            $dni = $_POST['dni'];
            $nombres= $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            
            $error='';
           $nuevo->modificaruser($con,$dni,$nombres,$apellidos,$direccion,$telefono);
            if($sql->rowCount() > 0)
              {
              $count = $sql -> rowCount();
              $salida= "<div class='content alert alert-primary' >
              Gracias: $count registro ha sido actualizado </div>";
              }
            elseif($sql->rowCount() ==0){
              $salida="<div class='content alert alert-danger'> No se modificó nada, CANCELAR para salir. </div>";
            }
              else{$salida= "<div class='content alert alert-danger'> No se pudo actualizar el registro </div>";
              print_r($sql->errorInfo()); 
              }
}elseif($_SERVER['REQUEST_METHOD']=='GET'){
          $dni="";
          $resultado=$nuevo->buscaruser($con,$dni,$iduser);

          $dni=$resultado['dni'];
          $nombres = $resultado['nomUsuario'];
          $apellidos =$resultado['apeUsuario'];
          $direccion =$resultado['dirUsuario'];
          $telefono=$resultado['telUsuario'];
}


if(isset($_SESSION['usuario'])){
  require "Views/usuarioModificar.view.php";
} else {
  header('Location: ../Login.php');
}


 ?>
