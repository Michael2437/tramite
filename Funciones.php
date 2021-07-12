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
        SELECT * FROM `usuario` WHERE `iduser` = :iduser OR `dni` = :dni');
        $statement->execute(array(
          ':iduser' =>$iduser,
          ':dni' => $dni
        ));
        $resultado = $statement->fetch();
        return $resultado;
    }
    public function modificaruser($conexion,$dni,$nombres,$apellidos,$direccion,$telefono,$dniantiguo){
      $sql = $conexion->prepare('
            UPDATE `usuario` SET `dni` = :dnimod, `nomUsuario` = :nombresmod, `apeUsuario` = :apellidosmod, `dirUsuario` = :direccionmod, `telUsuario` = :telefonomod WHERE `usuario`.`dni` = :dniantiguo;
            ');
      $sql->execute(array(
        ':dnimod'=> $dni,
        ':nombresmod'=>$nombres,
        ':apellidosmod'=>$apellidos,
        ':direccionmod' =>$direccion,
        ':telefonomod' =>$telefono,
        ':dniantiguo'=>$dniantiguo
      ));
      return $sql;
    }
    
    /*estas 2 funciones son para los select de tipo de expediente y area respectivamente. */
          public function tipoExp($conexion){
            $statement=$conexion->prepare(
              'SELECT * FROM `tipodocumento`'
            );
            $statement->execute();
            return $statement;
          }
          public function nuevoTexp($con,$tipExp){
            $statement=$con->prepare(
              'INSERT INTO `tipodocumento` ( `descTipoDoc`) VALUES (:tipExp)'
            );
            $statement->execute(array(
              ':tipExp'=>$tipExp
            ));
            return $statement;
          }
          public function eliminarTexp($con,$idTexp){
            $statement=$con->prepare(
              'DELETE FROM `tipodocumento` WHERE `tipodocumento`.`idTipoDoc` = :idTexp'
            );
            $statement->execute(array(
              ':idTexp'=>$idTexp
            ));
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
    public function registroexp($conexion,$iduser,$fecha,$asunto,$remitente,$nArea,$tipoExp,$estadoDoc,$detalle){
      $statement = $conexion->prepare('
      INSERT INTO `documento` ( `iduser`, `fecha`, `Asunto`,`remitente` ,`nomArea`,`tipoExp`,`estadoExp`,`detalleExp`) VALUES (:iduser, :fecha, :asunto,:remitente, :nArea,:tipoExp,:estadoExp,:detalle)');
      $statement->execute(array(
      ':iduser' =>$iduser,
      ':fecha'  =>$fecha,
      ':remitente'=>$remitente,
      ':asunto' =>$asunto,
      ':nArea'  =>$nArea,
      ':tipoExp' =>$tipoExp,
      ':estadoExp'=>$estadoDoc,
      ':detalle'=>$detalle
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
      return $statement;
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
    public function estadocompleto($conexion,$idDoc,$detalle){
      $consulta=$conexion->prepare(
        'UPDATE `documento` SET `estadoExp` = "Completado",`detalleExp`=:detalleDoc WHERE `documento`.`idDoc` = :idDoc'
      );
      $consulta ->execute(array(
        'idDoc'=> $idDoc,
        'detalleDoc'=>$detalle
      ));
      return $consulta;
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
      
      return $consulta;
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

/* Funciones del <Admin></Admin>*/
/*Crear area*/
      public function crearArea($conexion,$nomArea,$codArea){
        $consulta=$conexion->prepare(
          'INSERT INTO `area` (`idArea`, `nomArea`, `codArea`, `rol`) VALUES (NULL, :nomArea, :codArea, "Area")'
        );
        $consulta ->execute(array(
          ':nomArea'=>$nomArea,
          ':codArea'=>$codArea
        ));
        return $consulta;
      }
      public function crearListadoArea($conexion,$nomArea){
        $consulta=$conexion->prepare(
          'INSERT INTO `listadoarea` (`idArea`, `nomArea`) VALUES (NULL, :nomArea)'
        );
        $consulta ->execute(array(
          ':nomArea'=>$nomArea
        ));
      }
/*modificar areas 2 consultas */
    public function modificarArea($conexion,$nomArea,$codArea,$id){
      $consulta=$conexion->prepare(
        'UPDATE `area` SET `nomArea`=:nomArea,`codArea` = :codArea WHERE `area`.`idArea` = :id'
      );
      $consulta ->execute(array(
        ':nomArea'=>$nomArea,
        ':codArea'=>$codArea,
        ':id'=>$id
      ));
      return $consulta;
    }
    public function modificarListadoArea($conexion,$nomArea,$Area){
      $consulta=$conexion->prepare(
        'UPDATE `listadoarea` SET `nomArea`=:nomArea WHERE `listadoarea`.`nomArea`=:Area'
      );
      $consulta ->execute(array(
        ':nomArea'=>$nomArea,
        ':Area'=>$Area
      ));
    }
/*Para ver las areas */
      public function MostrarAreas($conexion){
        $consulta=$conexion->prepare(
          'SELECT * FROM `area`'
        );
        $consulta ->execute();
        return $consulta;
      }
      /*obtener areas por id */
      public function selectAreas($conexion,$id){
        $consulta=$conexion->prepare(
          'SELECT * FROM `area` Where `idArea` =:id'
        );
        $consulta ->execute(array(
          ':id'=>$id
        ));
        $resultado=$consulta->fetch();
        return $resultado;
      }
/*Modificar expediente*/

public function modificarexp($conexion,$nExp,$fecha,$asunto,$nArea,$nExpAntes){
      $statement = $conexion->prepare('
      UPDATE `documento` SET `idDoc`=:nExp, `fecha`=:fecha,`Asunto`=:asunto ,`nomArea`=:nArea WHERE `documento`.`idDoc`=:nExpAntes');
     try{
      $statement->execute(array(
      ':nExp' =>$nExp,
      ':fecha'  =>$fecha,
      ':asunto' =>$asunto,
      ':nArea'  =>$nArea,
      ':nExpAntes'=>$nExpAntes
      ));}
      catch(PDOException $ex){
        $statement= false;
      }
      return $statement;
    }
  }
?>
