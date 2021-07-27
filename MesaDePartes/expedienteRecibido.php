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
    Select * From `mdpvirtual` 
');
$statement->execute();

// descargar el archivo
if(isset($_GET['id'])) 
{
    $id =$_GET['id'];
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

// Ver detalle de archivo
if(isset($_GET['idDoc'])){
    $idDoc=$_GET['idDoc'];
    $resultado=$nuevo->expIdVirtual($con,$idDoc);
    $id=$resultado['idUser'];
    $nExp=$resultado['IDmdpV'];
    $detalle=$resultado['detalleV'];
    $idarea=$resultado['idArea'];
    $areaAct=$nuevo->obtenerdescarea($con,$idarea);

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
    $resultado=$nuevo->expIdVirtual($con,$idDoc);
    $id=$resultado['idUser'];
    $nExp=$resultado['IDmdpV'];
    $detalle=$resultado['detalleV'];
  
    $e=$_GET['e'];
  if($e==1){
    $modal="myDerivar";
  }elseif($e==2){
    $modal="myRechazar";
  }
    $script="
    <script>
    $( document ).ready(function() {
        $('#".$modal."').modal('toggle')
    });
    </script>";
  }

//   envio de derivación
  if(isset($_POST['nExp'])){
      $nExp=$_POST['nExp'];
      $fila=$nuevo->expIdVirtual($con,$nExp);
      $iduser=$fila['idUser'];
      $recepcion=2;
      $idarea=$fila['idArea'];
      $idTipoExp=$fila['idTipoExp'];
      $idEstado=1;
      $idArchivo=$fila['idArchivo'];
      $remitente=$user;
      $fecha = date("Y-m-d H:i:s");
      $asunto=$fila['asuntoV'];
      $detalle=$fila['detalleV'];
      $namearea=$nuevo->obtenerdescarea($con,$idarea);
      $detalle.="<br>El expediente fue aprobado el: ".$fecha." y enviado a: ".$namearea;
      
      $derivado=$nuevo->registroexp($con,$iduser,$recepcion,$idarea,$idTipoExp,$idEstado,$idArchivo,$fecha,$asunto,$remitente,$detalle);
      $e=1;
      $nuevo->changestatus($con,$nExp,$e);
  
      $respuesta=$nuevo->buscaruser($con,"",$iduser);
      $correo=$respuesta['correo'];
      $asuntocorreo="Respuesta";
      $doc=$nuevo->buscarIdDoc($con);
      $asignado=$doc['idExp'];
      $mensajecorreo="Su expediente fue aceptado y con el numero de expediente N". $asignado;
      mail($correo,$asuntocorreo,$mensajecorreo);
      $script="<script>
  $( document ).ready(function() {
      $('#myConfir').modal('toggle')
  });
  </script>";
  }

  if(isset($_POST['rechazo'])){
    $e=5;
    $dni="";
    $idrechazo=$_POST['rechazo'];
    $fila=$nuevo->expIdVirtual($con,$idrechazo);
    $iduser=$fila['idUser'];
    $columna=$nuevo->buscaruser($con,$dni,$iduser);
    $correo=$columna['correo'];
    $asunto="Rechazado";
    $mensaje=$_POST['mensaje'];

    $derivado=$nuevo->changestatus($con,$idrechazo,$e);
    mail($correo,$asunto,$mensaje);
    $script="<script>
  $( document ).ready(function() {
      $('#conRechazo').modal('toggle')
  });
  </script>";
  }
//   modal de derivado exitoso
if(isset($_SESSION['usuario'])){
  require 'Views/expedienteRecibido.view.php';
}else{
  header('Location: ../Login.php');
}

 ?>
