<?php

use Conexion as GlobalConexion;

Class Conexion{
    public function conectar(){
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=tramite', 'root','');
          }catch(PDOException $e){
            echo "Error:" . $e->getMessage();;
          }
           return $conexion;      
    }
    /*Funciones de login para el acceso con rol*/
    public function roles($conexion,$area){
        $statement = $conexion->prepare('
        SELECT * FROM area WHERE nomArea= :area');
        $statement->execute(array(
        ':area'=>$area
        ));
        $resultado = $statement->fetch();
        return $resultado;  
    }
    public function login($conexion,$area,$pass){
        $statement = $conexion->prepare('
        SELECT * FROM area WHERE nomArea= :area  AND codArea= :pass');
        $statement->execute(array(
          ':area' => $area,
          ':pass'=> $pass
        ));
        $resultado = $statement->fetch();
        return $resultado;
    }
    /* Funciones para registro, modificacion y buscar usuario*/
    public function validardni($conexion,$dni){
        $validar = $conexion->prepare('
        SELECT dni FROM `usuario` WHERE `dni` = :dni LIMIT 1;
        ');
        $validar->execute(array(
        ':dni' => $dni
        ));
        $validacion = $validar->fetch();
        return $validacion;
    }
    public function registrouser($conexion,$dni,$nombres,$apellidos,$direccion,$telefono){
        $statement = $conexion->prepare('
        INSERT INTO `usuario` (`dni`, `nomUsuario`, `apeUsuario`, `dirUsuario`, `telUsuario`) VALUES (:dni,  :nombres ,  :apellidos ,  :direccion,  :telefono );');
        $statement->execute(array(
        ':dni' => $dni,
        ':nombres' => $nombres,
        ':apellidos' => $apellidos,
        ':direccion' => $direccion,
        ':telefono' => $telefono
        ));
    }
    public function buscaruser($conexion,$dni,$iduser){
        $statement = $conexion->prepare('
        SELECT * FROM `usuario` WHERE `dni` = :dni OR `iduser` = :iduser');
        $statement->execute(array(
          ':dni' => $dni,
          ':iduser' =>$iduser
        ));
        $resultado = $statement->fetch();
        return $resultado;
    }
    public function modificaruser($conexion,$dni,$nombres,$apellidos,$direccion,$telefono){
      $sql = $conexion->prepare('
            UPDATE `usuario` SET `dni` = :dnimod, `nomUsuario` = :nombresmod, `apeUsuario` = :apellidosmod, `dirUsuario` = :direccionmod, `telUsuario` = :telefonomod WHERE `usuario`.`dni` = :dnimod;
            ');
      $sql->execute(array(
        ':dnimod'=> $dni,
        ':nombresmod'=>$nombres,
        ':apellidosmod'=>$apellidos,
        ':direccionmod' =>$direccion,
        ':telefonomod' =>$telefono
      ));
    }
    
    /*estas 2 funciones son para los select de tipo de expediente y area respectivamente. */
          public function tipoExp($conexion){
            $statement=$conexion->prepare(
              'SELECT * FROM `tipodocumento`'
            );
            $statement->execute();
            return $statement;
          }
          public function selectArea($conexion){
            $statement=$conexion->prepare(
              'SELECT * FROM `listadoarea`'
            );
            $statement->execute();
            return $statement;
          }
    /*Funciones concernientes a Expedientes*/
    public function buscarIdDoc($conexion){
      $statement=$conexion->prepare(
        'SELECT idDoc FROM `documento` ORDER BY idDoc DESC LIMIT 1'
      );
      $statement->execute();
      $resultado=$statement->fetch();
      return $resultado;
    }
    public function registroexp($conexion,$iduser,$fecha,$asunto,$remitente,$nArea,$tipoExp,$estadoDoc){
      $statement = $conexion->prepare('
      INSERT INTO `documento` ( `iduser`, `fecha`, `Asunto`,`remitente` ,`nomArea`,`tipoExp`,`estadoExp`) VALUES (:iduser, :fecha, :asunto,:remitente, :nArea,:tipoExp,:estadoExp)');
      $statement->execute(array(
      ':iduser' =>$iduser,
      ':fecha'  =>$fecha,
      ':remitente'=>$remitente,
      ':asunto' =>$asunto,
      ':nArea'  =>$nArea,
      'tipoExp' =>$tipoExp,
      ':estadoExp'=>$estadoDoc
      ));
    }
    public function mostrarexp($conexion,$iduser){
        $statement = $conexion->prepare('
        SELECT * FROM `documento` WHERE `iduser` = :iduser');
        $statement->execute(array(
          ':iduser' => $iduser
        ));
        return $statement;
    }
    public function buscarExp($conexion,$nExp){
      $statement = $conexion->prepare('
      SELECT * FROM `documento` WHERE `idDoc` = :idDoc');
      $statement->execute(array(
        ':idDoc' => $nExp
      ));
      $resultado=$statement->fetch();
      return $resultado;
    }
    /*Funciones para las areas */
    public function expArea($conexion,$area){
      $consulta=$conexion-> prepare('
      SELECT * FROM `documento` WHERE nomArea = :area');
      $consulta->execute(array(
        ':area'=>$area
      ));
      return $consulta;
    }
    public function expIdDoc($conexion,$idDoc){
      $consulta=$conexion-> prepare('
      SELECT * FROM `documento` WHERE idDoc = :idDoc');
      $consulta->execute(array(
        ':idDoc'=>$idDoc
      ));
      $resultado=$consulta->fetch();
      return $resultado;
    }
    public function cambioestado($conexion,$idDoc){
      $consulta=$conexion->prepare(
        'UPDATE `documento` SET `estadoExp` = "Abierto" WHERE `documento`.`idDoc` = :idDoc'
      );
      $consulta ->execute(array(
        'idDoc'=> $idDoc
      ));
    }
    public function derivar($conexion,$remitente,$nomArea,$mensaje,$idDoc){
      $consulta=$conexion->prepare(
        'UPDATE `documento` SET `remitente` = :remitente,`nomArea`=:nomArea,`estadoExp` ="Nuevo",`mensaje`=:mensaje WHERE `documento`.`idDoc` = :idDoc'
      );
      $consulta ->execute(array(
        ':remitente'=>$remitente,
        ':nomArea'=>$nomArea,
        ':mensaje'=>$mensaje,
        'idDoc'=> $idDoc
      ));
    }
    public function detalle($conexion,$detalle,$idDoc){
      $consulta=$conexion->prepare(
        'UPDATE `documento` SET `detalleExp` = :detalle WHERE `documento`.`idDoc` = :idDoc'
      );
      $consulta ->execute(array(
        ':detalle'=>$detalle,
        ':idDoc'=>$idDoc
      ));
    }
  }
?>
