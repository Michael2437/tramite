<?php session_start();

include_once '../Funciones.php';

$nuevo= new Conexion();
$user =$_SESSION['usuario'];
$con =$nuevo->conectar();
$listado= $nuevo->roles($con,$user);

$area=$listado['nomArea'];
$rol=$listado['rol'];

$dni="";
$iduser="";
$salida="";
if(isset($_POST['dni']) ){
  $dni = $_POST['dni'];
}
if(isset($_GET['iduser'])){
  $iduser=$_GET['iduser'];
}
$resultado=$nuevo->buscaruser($con,$dni,$iduser);

          if($resultado){
            $id=$resultado['iduser'];
            $dni=$resultado['dni'];
            $nombres = $resultado['nomUsuario'];
            $apellidos =$resultado['apeUsuario'];
            $direccion =$resultado['dirUsuario'];
            $telefono=$resultado['telUsuario'];

            $salida .= "<div class='row'>
            <div class='col-md-2'></div>
            <div class='class-md-8'>
            <div class='main-card mb-3 card'>
                <div class='card-body'>
                  
                  <div>
            <form name='datos' method='post' >
            <div class='form-row'>
              <div class='col-md-3'>
                    <div class='position-relative form-group'><label  class=''>DNI</label>
                    <input name='dnir' disabled=»disabled» id='nombres' value=' ".$dni." 'type='text' class='form-control text-center'>
                  </div>
              </div>
              <div class='col-md-5'>
                  <div class='position-relative form-group'><label  class=''>Nombres</label>
                    <input name='nombresreg' disabled=»disabled» id='nombres' value= ' ".$nombres." ' type='text' class='form-control'>
                  </div>
              </div>
              <div class='col-md-4'>
                  <div class='position-relative form-group'><label  class=''>Apellidos</label>
                    <input name='apellidosreg' disabled=»disabled» id='apellidos' value= ' ".$apellidos." ' type='text' class='form-control'>
                  </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-8'>
                <div class='position-relative form-group'>
                  <label for='examplePassword11' class=''>Dirección</label>
                  <input name='direccionreg' disabled=»disabled» id='direccion' value= ' ".$direccion." ' type='text' class='form-control'>
                </div>
              </div>
              <div class='col-md-4'>
                <div class='position-relative form-group'><label for='exampleEmail11' class=''>Telefono</label>
                  <input name='telefonoreg' disabled=»disabled» id='telefono' value=' ".$telefono." ' type='tel' class='form-control'>
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-8'>
                <div class='position-relative form-group'><label for='examplePassword11' class=''>Correo</label>
                  <input name='correo' id='correo' placeholder='Ingrese correo electrónico' type='email' class='form-control'>
                </div>
              </div>
              <div class='col-md-4'>
                <div class='position-relative form-group'><label for='exampleAddress' class=''>Tipo Usuario</label>
                  <select class='mb-2 form-control'>
                    <option value='tipouse'>Normal</option>
                    <option value='tipouser'>Jurídico</option>
                  </select>
                </div>
              </div>
            </div>
            <div class='form-row'>
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

            </div>
            <div class='form-row'>

              <div class='col-md-4'>
                <div class='text-center'>
                <a href='expedienteNuevo.php?iduser=". $id." ' class='mt-2 btn btn-primary'>Nuevo Expediente</a>
                  
                </div>
              </div>
              <div class='col-md-4'>
                <div class='text-center'>
                <a href='expedienteVer.php?iduser=". $id." ' class='mt-2 btn btn-primary'>Ver Expedientes</a>
                  
                </div>
              </div>
              <div class='col-md-4'>
                <div class='text-center'>
                <a href='usuarioModificar.php?iduser=".$id." ' class='mt-2 btn btn-primary'>Modificar</a>
                  
                    </div>
                  </div>
                </div>
            </form>
            </div>
                                </div>
                              </div>
                            </div>
                            <div class='col-md-2'></div>
                            </div>";
          }else {
            $salida.="<div class='text-center'>El DNI no está registrado</div>";
          }
    


if(isset($_SESSION['usuario'])){
  require 'Views/modificarUsuario.view.php';
}else{
  header('Location: ../Login.php');
}

 ?>
