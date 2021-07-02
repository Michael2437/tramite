<?php session_start();

if(isset($_SESSION['usuario'])){
  if($_SESSION['usuario']== "Mesa de Partes"){
    header('Location: contenido.php');}
    else{
      header('Location: area.php');
    }
}else {
  header('Location: login.php');
}

 ?>
