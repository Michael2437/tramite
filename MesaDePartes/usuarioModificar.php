<?php session_start();

include_once '../Funciones.php';

$nuevo= new Conexion();
$user =$_SESSION['usuario'];
$con =$nuevo->conectar();
$listado= $nuevo->roles($con,$user);

$area=$listado['nomArea'];
$rol=$listado['rol'];
$script="";

if($_SERVER['REQUEST_METHOD']=='POST'){
            $dnir=$_POST['dnir'];
            $dni = $_POST['dni'];
            $iduser="";
            $fila=$nuevo->buscaruser($con,$dni,$iduser);
            $iduser=$fila['idUser'];
            $nombres= $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $correo=$_POST['correo'];
            $tipo=$_POST['tipo'];
            if($tipo==1){
              $ruc=""; $razonsocial="";
            }elseif($tipo==2){
              $ruc=$_POST['ruc']; $razonsocial=$_POST['razonsocial'];
            }
            
           $sql=$nuevo->modificaruser($con,$dni,$nombres,$apellidos,$direccion,$telefono,$correo,$tipo,$ruc,$razonsocial,$dnir);
            if($sql->rowCount() > 0)
              {
              $count = $sql -> rowCount();
              $salida= "<div class='content alert alert-primary' >
              Gracias: $count registro ha sido actualizado </div>";
              $script.="<script>
              $( document ).ready(function() {
                  $('#myModal').modal('toggle')
              });
              </script>";
              }
            elseif($sql->rowCount() ==0){
              $salida="<div class='content alert alert-danger'> No se modificó nada, CANCELAR para salir. </div>";
            }
              else{$salida= "<div class='content alert alert-danger'> No se pudo actualizar el registro </div>";
              print_r($sql->errorInfo()); 
              }
              
}elseif($_SERVER['REQUEST_METHOD']=='GET'){
          $iduser= $_GET['iduser'];
          $dni="";
          $resultado=$nuevo->buscaruser($con,$dni,$iduser);

          $dni=$resultado['dni'];
          $nombres = $resultado['nomUser'];
          $apellidos =$resultado['apeUser'];
          $direccion =$resultado['dirUser'];
          $telefono=$resultado['telUser'];
          $correo=$resultado['correo'];
          $ruc=$resultado['ruc'];
          $razonsocial=$resultado['razonsocial'];
          
}


if(isset($_SESSION['usuario'])){
  require "Views/usuarioModificar.view.php";
} else {
  header('Location: ../Login.php');
}


 ?>
