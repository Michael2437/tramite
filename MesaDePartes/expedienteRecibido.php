<?php session_start();

include_once '../Funciones.php';
date_default_timezone_set('America/Lima');
// Crear nuevo objeto
$nuevo= new Conexion();
// Asignando nombre de area
$user =$_SESSION['usuario'];
// conectando a bd
$con =$nuevo->conectar();
// obteniendo datos de user
$listado= $nuevo->roles($con,$user);
$area=$listado['nomArea'];
$rol=$listado['rol'];
$listaArea=$nuevo->selectArea($con);

$statement=$con->prepare('
    Select * From `expediente` where `idArea`=2
');
$statement->execute();

// descargar el archivo
if(isset($_GET['id'])) 
{
    $id =$_GET['id'];
$conexion= mysqli_connect("localhost","root","");
if($conexion)
{
    mysqli_select_db($conexion,"mejorado");
}
 else {
     echo "could not connect to the database".die(mysqli_error($conexion));
}
$query = "SELECT nomArchivo, tipArchivo, tamArchivo, contenido " .
         "FROM archivoexp WHERE idExp = '$id'";
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

// Ver detalle de archivo
if(isset($_GET['idDoc'])){
    $idDoc=$_GET['idDoc'];
    $resultado=$nuevo->expIdDoc($con,$idDoc);
    $id=$resultado['idUser'];
    $nExp=$resultado['idExp'];
    $detalle=$resultado['detalle'];
    $idarea=$resultado['idArea'];
    $areaAct=$nuevo->obtenerdescarea($con,$idarea);
  
    $statement = $nuevo->mostrarexp($con,$id);
    $script="
    <script>
    $( document ).ready(function() {
        $('#myModal').modal('toggle')
    });
    </script>";
  }


//   modal de derivación
  if(isset($_GET['derivar'])){
    $idDoc=$_GET['derivar'];
    $resultado=$nuevo->expIdDoc($con,$idDoc);
    $id=$resultado['idUser'];
    $nExp=$resultado['idExp'];
    $detalle=$resultado['detalle'];
    $idarea=$resultado['idArea'];
    $areaAct=$nuevo->obtenerdescarea($con,$idarea);
  
    $statement = $nuevo->mostrarexp($con,$id);
    $script="
    <script>
    $( document ).ready(function() {
        $('#myDerivar').modal('toggle')
    });
    </script>";
  }

//   envio de derivación
  if(isset($_POST['nExp'])){
      $nExp=$_POST['nExp'];
      $sArea=$_POST['nomArea'];
      $mensaje="";
      $nuevo->derivar($con,$user,$sArea,$mensaje,$nExp);

      $namearea=$nuevo->obtenerdescarea($con,$sArea);
      $fecha = date("Y-m-d H:i:s");
      $result=$nuevo->expIdDoc($con,$nExp);
      $detalle =$result['detalle'];
      $detalle.="<br>El expediente fue aprobado el: ".$fecha." y enviado a: ".$namearea;
      $nuevo->detalle($con,$detalle,$nExp);
  }

//   modal de derivado exitoso
if(isset($_SESSION['usuario'])){
  require 'Views/expedienteRecibido.view.php';
}else{
  header('Location: ../Login.php');
}

 ?>
