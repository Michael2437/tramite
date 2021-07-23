<?php
include_once '../Funciones.php';
date_default_timezone_set('America/Lima');
$nuevo=new Conexion();
$con=$nuevo->conectar();

$conexion= mysqli_connect("localhost","root","");
if($conexion)
{
    mysqli_select_db($conexion,"mejorado");
}
 else {
     echo "could not connect to the database".die(mysqli_error($conexion));
}

$listaTipo=$nuevo->tipoExp($con);
$listaArea=$nuevo->selectArea($con);

if($_SERVER['REQUEST_METHOD']=='POST'){
//recibiendo datos del usuario
    $dni=$_POST['dni'];
    $iduser="";
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $dirección=$_POST['direccion'];
    $telefono=$_POST['telefono'];
    $correo=$_POST['correo'];
    $tipouser=$_POST['tipo'];
    if($tipouser=="1"){
        $ruc=""; $razonsocial="";
      } else{
        $ruc=$_POST['ruc']; $razonsocial=$_POST['razonsocial'];
      }
    $nuevo->registrouser($con,$dni,$nombre,$apellidos,$dirección,$telefono,$correo,$tipouser,$ruc,$razonsocial);

//obteniendo el id user del usuario registrado para registrar expediente
    $fila=$nuevo->buscaruser($con,$dni,$iduser);
    $iduser=$fila['idUser'];
//recepcion de los datos del expediente
    $tipoExp=$_POST['tipExp'];
    $mdp=2;// Area a donde se enviará para su evaluación
    $asunto=$_POST['asunto'];
    $nArea=$_POST['nomArea'];//Area a la que solicita enviar
    $nomarea=$nuevo->obtenerdescarea($con,$nArea);
    $remitente=$nombre." ".$apellidos;
    $fecha = date("Y-m-d H:i:s"); 
    $estadoDoc=4;//Solo cuando se registra virtual, espera confirmacion de documentos
    $detalle ="El documento llego el: ".$fecha." será evaluado y enviado a: ".$nomarea;
    
    $nuevo->registroexp($con,$iduser,$mdp,$tipoExp,$estadoDoc,$fecha,$asunto,$remitente,$detalle);

    $buscando=$nuevo->buscarIdDoc($con);
    $idDoc=$buscando['idExp'];
    //Detalles del archivo
    $fileName = $_FILES['userfile']['name'];
    $tmpName  = $_FILES['userfile']['tmp_name'];
    $fileSize = $_FILES['userfile']['size'];
    $fileType = $_FILES['userfile']['type'];
    $fileType=mysqli_real_escape_string($conexion,
    stripslashes ($fileType));
    $fp      = fopen($tmpName, 'r');
    $content = fread($fp, filesize($tmpName));
    $content = addslashes($content);
    fclose($fp);
    $fileName = addslashes($fileName);
    if($conexion){
    $query = "INSERT INTO archivoexp (idExp,nomArchivo,tamArchivo,tipArchivo,contenido) ".
    "VALUES ('$idDoc','$fileName', '$fileSize','$fileType','$content')";
    mysqli_query($conexion,$query) or die('Error, query failed'); 
    mysqli_close($conexion);
    }
}

require 'Views/registrar.view.php';
?>