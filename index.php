<?php session_start();

if(isset($_SESSION['usuario'])){
  if($_SESSION['usuario']== "Administrador"){
    header('Location: Admin\indexAdmin.php');}
  elseif($_SESSION['usuario']== "Mesa de Partes"){
    header('Location: MesaDePartes\indexMDP.php');}
    else{
      header('Location: Areas\indexAreas.php');
    }
}else {
  header('Location: Login.php');
}

 ?>
