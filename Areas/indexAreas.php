<?php session_start();

include_once '../Funciones.php';
date_default_timezone_set('America/Lima');
define('CANT_EXP',4);

$nuevo= new Conexion();
$user =$_SESSION['usuario'];
$con =$nuevo->conectar();
$listado= $nuevo->roles($con,$user);

$area=$listado['nomArea'];
$rol=$listado['rol'];
$consulta=$nuevo->expArea($con,$area);
$fechaactual = date("Y-m-d H:i:s"); 
$idarea=$nuevo->obteneridarea($con,$area);

/*Añadiendo paginación a la tabla */
if(isset($_GET['page'])){
  $page=$_GET['page'];
  if(isset($_GET['e'])){
    $e=$_GET['e'];
    $class="active";
    if($e==1){
      $o=$nuevo->contarExp($con,$e,$idarea);
      if(!$page){
        $start =0;
        $page=1;
      }else{
        $start=($page-1)* CANT_EXP;
      }
      $total=$o->fetchColumn();
      $totalpag=ceil($total/CANT_EXP);
      $consulta=$nuevo->filtrarexpArea($con,$e,$idarea,$start,CANT_EXP);
    }else{
      $o=$nuevo->contarExp($con,$e,$idarea);
      if(!$page){
        $start =0;
        $page=1;
      }else{
        $start=($page-1)* CANT_EXP;
      }
      $total=$o->fetchColumn();
      $totalpag=ceil($total/CANT_EXP);
      $consulta=$nuevo->filtrarexpArea($con,$e,$idarea,$start,CANT_EXP);}
  }
  
}


/*Ver Detalle del expediente */
if(isset($_GET['idDoc'])){
  $idDocu=$_GET['idDoc'];

  $resultado=$nuevo->expIdDoc($con,$idDocu);
  $detalle=$resultado['detalle'];
  $idarea=$resultado['idArea'];
  $nomArea=$nuevo->obtenerdescarea($con,$idarea);
  $script="
  <script>
  $( document ).ready(function() {
      $('#myModal').modal('toggle')
  });
  </script>";
}

// Descargar el archivo 
if(isset($_GET['id'])){
  $idDocu=$_GET['id'];

          $statement=$con->prepare('
            Select * From `mdpvirtual` 
        ');
        $statement->execute();
        $fila= $statement->fetch();
            $idarchi=$fila['idArchivo'];
        $conexion= mysqli_connect("localhost","root","");
        if($conexion)
        {
            mysqli_select_db($conexion,"mejorado");
        }
        else {
            echo "could not connect to the database".die(mysqli_error($conexion));
        }
        $query = "SELECT nomArchivo, tipArchivo, tamArchivo, contenido " .
                "FROM archivoexp WHERE idArchivo = '$idarchi'";
        $result = mysqli_query($conexion,$query) or die('Error, query failed');
        list($name, $type, $size, $content) = mysqli_fetch_array($result);
        header("Content-length: $size");
        header("Content-type: $type");
        header("Content-Disposition: attachment; filename=$name");
        ob_clean();
        flush();
        echo $content;
        mysqli_close($conexion);
        exit;
}

/*SU VIEW */
if(isset($_SESSION['usuario'])){
    require 'Views/indexAreas.view.php';
  }else{
    header('Location: ../Login.php');
  }
?>