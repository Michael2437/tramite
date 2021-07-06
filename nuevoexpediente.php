<?php session_start();

include_once 'misfunciones.php';
date_default_timezone_set('America/Lima');
$nuevo= new Conexion();
$user =$_SESSION['usuario'];
$con =$nuevo->conectar();
$listado= $nuevo->roles($con,$user);

$area=$listado['nomArea'];
$rol=$listado['rol'];

$buscando=$nuevo->buscarIdDoc($con);
$idDoc=$buscando['idDoc']+1;

$listaTipo=$nuevo->tipoExp($con);
$listaArea=$nuevo->selectArea($con);


if(isset($_GET['iduser'])){
    $iduser= $_GET['iduser'];
  }
if($_SERVER['REQUEST_METHOD']=='POST'){
    $remitente=$area;
    $fecha = date("Y-m-d H:i:s"); 
    $asunto=$_POST['asunto'];
    $nArea=$_POST['selectArea'];
    $tipoExp=$_POST['tipExp'];
    $estadoDoc=$_POST['estadoDoc'];
    $procesoDoc="En trámite";
    $detalle ="Registrado el: ".$fecha.". Enviado a: ".$nArea."\n";
    $nuevo->registroexp($con,$iduser,$fecha,$asunto,$remitente,$nArea,$tipoExp,$estadoDoc,$procesoDoc,$detalle);
}
if(!empty($_GET['iduser'])){
    $dni="";
    $resultado=$nuevo->buscaruser($con,$dni,$iduser);
    $salida = "";
    if ($resultado) {
        $id = $resultado['iduser'];
        $dni=$resultado['dni'];
        $nombres = $resultado['nomUsuario'];
        $apellidos = $resultado['apeUsuario'];
        $salida .= "<form name='datos' method='post' >
            <div class='form-row'>
                <div class='col-md-6'>
                    <div class='position-relative form-group'><label  class=''>N° Expediente</label>
                    <input name='idDoc' disabled=»disabled» id='idDoc' value=' " . $idDoc . " 'type='text' class='form-control text-center'>
                  </div>
              </div>
              <div class='col-md-6'>
                    <div class='position-relative form-group'><label  class=''>DNI</label>
                    <input name='dnir' disabled=»disabled» id='nombres' value=' " . $dni . " 'type='text' class='form-control text-center'>
                  </div>
              </div>
            
              <div class='col-md-6'>
                  <div class='position-relative form-group'><label  class=''>Nombres</label>
                    <input name='nombresreg' disabled=»disabled» id='nombres' value= ' " . $nombres . " ' type='text' class='form-control text-center'>
                  </div>
              </div>
              <div class='col-md-6'>
                  <div class='position-relative form-group'><label  class=''>Apellidos</label>
                    <input name='apellidosreg' disabled=»disabled» id='apellidos' value= ' " . $apellidos . " ' type='text' class='form-control text-center'>
                  </div>
              </div>
            </div>
        <div class='form-row'>
            <div class='col-md-6'>
                <div class='position-relative form-group'><label for='exampleAddress' class=''>Tipo de Expediente</label>
                <select class='form-control' id='tipExp' name='tipExp'>";

                while($tipExp=$listaTipo->fetch()){
                    $salida.="<option value='".$tipExp['descTipoDoc']."'>".$tipExp['descTipoDoc']."</option>";
                    }
              
                $salida.= "</select>
                </div>
            </div>
            <div class='col-md-6'>
               <div class='position-relative form-group'><label for='exampleAddress2' class=''>Area</label>
                    <select class='form-control' id='selectArea' name='selectArea'>";

                    while($selectArea=$listaArea->fetch()){
                        $salida.="<option value='".$selectArea['nomArea']."'>".$selectArea['nomArea']."</option>";
                        }
                
                    $salida.= "</select>
                </div>
            </div>
            <div class='col-md-6'>
                <div class='position-relative form-group text-center'><label for='exampleAddress' class=''>Asunto</label>
                <input name='asunto' id='asunto' placeholder='Ingrese Asunto' type='text' class='form-control' autocomplete='off'>
                </div>
            </div>
            <div class='col-md-6'>
                <div class='position-relative form-group text-center'><label for='exampleAddress' class=''>Estado</label>
                <input name='estadoDoc' id='estadoDoc' value='Nuevo' readonly type='text' class='form-control text-center'>
                </div>
            </div>
        </div>
            <div> 
                <div class='form-row'>
                    <div class='col-md-6'>
                        <div class='text-center'>
                        <button type='submit' class='mt-2 btn btn-primary'>Registrar Expediente</button>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='text-center'>
                        <a href='buscaruser.php?iduser=".$iduser."' class='mt-2 btn btn-primary'>Atras</a>
                    </div>
                </div>
            </div>
            </form>";
           
            }else {
                $salida.="<div class='text-center'>El DNI no está registrado</div>";
              }
    
}

if (isset($_SESSION['usuario'])) {
    require "views/nuevoexpediente.view.php";
} else {
    header('Location: login.php');
}
?>