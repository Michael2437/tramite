<?php

use Conexion as GlobalConexion;

Class Conexion{
    public function conectar(){
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=mejorado', 'root','');
          }catch(PDOException $e){
            echo "Error:" . $e->getMessage();;
          }
           return $conexion;      
    }
    // Funcion solo para LOGIN.PHP, verifica contraseña
    public function login($conexion,$area,$pass){
      $statement = $conexion->prepare('
      SELECT * FROM area WHERE nomArea= :area  AND codArea= :pass');
      $statement->execute(array(
        ':area' => $area,
        ':pass'=> $pass
      ));
      return $statement;
  }
    /*Funcion para el acceso con rol y mostrarlo*/
    public function roles($conexion,$area){
        $statement = $conexion->prepare('
        SELECT * FROM area WHERE nomArea= :area');
        $statement->execute(array(
        ':area'=>$area
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
    //  registrar usuario
    public function registrouser($conexion,$dni,$nombres,$apellidos,$direccion,$telefono,$correo,$tipouser,$ruc,$razonsocial){
        $statement = $conexion->prepare('
        INSERT INTO `usuario` (`dni`, `nomUser`, `apeUser`, `dirUser`, `telUser`, `correo`,`idTipoUser`,`ruc`,`razonsocial`) VALUES (:dni,  :nombres ,  :apellidos ,  :direccion,  :telefono, :correo, :tipouser, :ruc, :razonsocial );');
        $statement->execute(array(
        ':dni' => $dni,
        ':nombres' => $nombres,
        ':apellidos' => $apellidos,
        ':direccion' => $direccion,
        ':telefono' => $telefono,
        ':correo' =>$correo,
        ':tipouser'=>$tipouser,
        ':ruc'=>$ruc,
        ':razonsocial'=>$razonsocial
        ));
        return $statement;
    }
    // buscar usuario
    public function buscaruser($conexion,$dni,$iduser){
        $statement = $conexion->prepare('
        SELECT * FROM `usuario` WHERE `idUser` = :iduser OR `dni` = :dni');
        $statement->execute(array(
          ':iduser' =>$iduser,
          ':dni' => $dni
        ));
        $resultado = $statement->fetch();
        return $resultado;
    }
// funciones para obtener el tipo de usuario, con el id
    public function obtenerTipoUser($con,$idtipo){
      $statement=$con->prepare('
      SELECT descTipoUser FROM `tipousuario` WHERE idTipoUser=:idtipo
      ');
      $statement->execute(array(
        ':idtipo'=>$idtipo
      ));
      $resultado=$statement->fetch();
      $desctipo=$resultado['descTipoUser'];
      return $desctipo;
    }
    public function obtenerdescarea($con,$idarea){
      $statement=$con->prepare('
      SELECT nomArea FROM `area` WHERE idArea=:idarea
      ');
      $statement->execute(array(
        ':idarea'=>$idarea
      ));
      $resultado=$statement->fetch();
      $nomArea=$resultado['nomArea'];
      return $nomArea;
    }
    public function obtenerTipoExp($con,$idtipoexp){
      $statement=$con->prepare('
      SELECT descTipoExp FROM `tipoexp` WHERE idTipoExp=:idtipoexp
      ');
      $statement->execute(array(
        ':idtipoexp'=>$idtipoexp
      ));
      $resultado=$statement->fetch();
      $tipoexp=$resultado['descTipoExp'];
      return $tipoexp;
    }
    public function obtenerNomEstado($con,$idestado){
      $statement=$con->prepare('
      SELECT nomEstado FROM `estadoexp` WHERE idEstado=:idestado
      ');
      $statement->execute(array(
        ':idestado'=>$idestado
      ));
      $resultado=$statement->fetch();
      $estadoexp=$resultado['nomEstado'];
      return $estadoexp;
    }
    public function obteneridarea($con,$nomarea){
      $statement=$con->prepare('
      SELECT idArea FROM `area` WHERE nomArea=:nomarea
      ');
      $statement->execute(array(
        ':nomarea'=>$nomarea
      ));
      $resultado=$statement->fetch();
      $estadoexp=$resultado['idArea'];
      return $estadoexp;
    }
  // modificar el usuario
    public function modificaruser($conexion,$dni,$nombres,$apellidos,$direccion,$telefono,$dniantiguo){
      $sql = $conexion->prepare('
            UPDATE `usuario` SET `dni` = :dnimod, `nomUser` = :nombresmod, `apeUser` = :apellidosmod, `dirUser` = :direccionmod, `telUser` = :telefonomod WHERE `usuario`.`dni` = :dniantiguo;
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
              'SELECT * FROM `tipoexp`'
            );
            $statement->execute();
            return $statement;
          }
          public function nuevoTexp($con,$tipExp){
            $statement=$con->prepare(
              'INSERT INTO `tipoexp` ( `descTipoExp`) VALUES (:tipExp)'
            );
            $statement->execute(array(
              ':tipExp'=>$tipExp
            ));
            return $statement;
          }
          public function eliminarTexp($con,$idTexp){
            $statement=$con->prepare(
              'DELETE FROM `tipoexp` WHERE `tipoexp`.`idTipoExp` = :idTexp'
            );
            $statement->execute(array(
              ':idTexp'=>$idTexp
            ));
            return $statement;
          }


          public function selectArea($conexion){
            $statement=$conexion->prepare(
              'SELECT * FROM `area`'
            );
            $statement->execute();
            return $statement;
          }
    /*Funciones concernientes a Expedientes*/
    public function buscarIdDoc($conexion){
      $statement=$conexion->prepare(
        'SELECT idExp FROM `expediente` ORDER BY idExp DESC LIMIT 1'
      );
      $statement->execute();
      $resultado=$statement->fetch();
      return $resultado;
    }
    public function registroexp($conexion,$iduser,$nArea,$tipoExp,$estadoDoc,$fecha,$asunto,$remitente,$detalle){
      $statement = $conexion->prepare('
      INSERT INTO `expediente` ( `idUser`,`idArea`,`idTipoExp`,`idEstado`, `fechaExp`,`remitente` , `asuntoExp`,`detalle`) VALUES (:iduser,:nArea,:tipoExp ,:estadoExp,:fecha,:remitente, :asunto ,:detalle)');
      $statement->execute(array(
      ':iduser' =>$iduser,
      ':nArea'  =>$nArea,
      ':tipoExp' =>$tipoExp,
      ':estadoExp'=>$estadoDoc,
      ':fecha'  =>$fecha,
      ':remitente'=>$remitente,
      ':asunto' =>$asunto,
      ':detalle'=>$detalle
      ));
    }
    public function mostrarexp($conexion,$iduser){
        $statement = $conexion->prepare('
        SELECT * FROM `expediente` WHERE `idUser` = :iduser');
        $statement->execute(array(
          ':iduser' => $iduser
        ));
        return $statement;
    }

    /*Filtrar expediente por usuario */
    public function filtrarexpUser($conexion,$estado,$iduser){
      switch ($estado){
        case 2: $e="3"; break;
        case 3: $e="1"; break;
        case 4: $e="2"; break;
      }
      $statement=$conexion->prepare('
      SELECT * FROM `expediente` where `expediente`.`idEstado` =:e and `expediente`.`iduser`=:iduser');
      $statement->execute(array(
        ':iduser'=>$iduser,
        ':e'=>$e
      ));
      return $statement;
    }
    /*Filtrar expediente por area */
    public function filtrarexpArea($conexion,$estado,$nomarea,$start,$cant){
      switch ($estado){
        case 2: $e="3"; break;
        case 3: $e="1"; break;
        case 4: $e="2"; break;
      }
      if($estado ==1){
        $statement=$conexion->prepare('
        SELECT * FROM `expediente` D left join estadoexp E on E.idEstado=D.idEstado WHERE D.idArea=:nomArea ORDER BY E.idEstado  LIMIT '.$start.', '.$cant);
        $statement->execute(array(
          ':nomArea'=>$nomarea
        ));
      }else{
        $statement=$conexion->prepare('
        SELECT * FROM `expediente` where `idEstado` =:e and `idArea`=:nomarea ORDER BY `fechaExp` ASC LIMIT '.$start.', '.$cant);
        $statement->execute(array(
          ':nomarea'=>$nomarea,
          ':e'=>$e
        ));
      }
      return $statement;
    }
    /*Contador de expedientes totales, completados,nuevos, abiertos */
    public function contarExp($conexion,$estado,$nomarea){
      switch ($estado){
        case 2: $e="3"; break;
        case 3: $e="1"; break;
        case 4: $e="2"; break;
      }
      if($estado ==1){
        $statement=$conexion->prepare('
        SELECT COUNT(*) FROM `expediente` WHERE `idArea` = :nomArea'
        );
        $statement->execute(array(
          ':nomArea'=>$nomarea
        ));
      }else{
        $statement=$conexion->prepare('
        SELECT COUNT(*) FROM `expediente` where `idArea` = :nomArea and `idEstado` =:estado'
        );
        $statement->execute(array(
          ':nomArea'=>$nomarea,
          ':estado'=>$e
        ));
      }
      return $statement;
    }
// funcion para buscar expediente por ID
    public function buscarExp($conexion,$nExp){
      $statement = $conexion->prepare('
      SELECT * FROM `expediente` WHERE `idExp` = :idDoc');
      $statement->execute(array(
        ':idDoc' => $nExp
      ));
      return $statement;
    }
    /*Funciones para las areas */
    public function expArea($conexion,$area){
      $consulta=$conexion-> prepare('
      SELECT * FROM `expediente` WHERE idArea = :area');
      $consulta->execute(array(
        ':area'=>$area
      ));
      return $consulta;
    }


/** */
    public function expIdDoc($conexion,$idDoc){
      $consulta=$conexion-> prepare('
      SELECT * FROM `expediente` WHERE idExp = :idDoc');
      $consulta->execute(array(
        ':idDoc'=>$idDoc
      ));
      $resultado=$consulta->fetch();
      return $resultado;
    }
    public function cambioestado($conexion,$idDoc){
      $consulta=$conexion->prepare(
        'UPDATE `expediente` SET `idEstado` = "2" WHERE `expediente`.`idExp` = :idDoc'
      );
      $consulta ->execute(array(
        'idDoc'=> $idDoc
      ));
    }
    public function estadocompleto($conexion,$idDoc,$detalle){
      $consulta=$conexion->prepare(
        'UPDATE `expediente` SET `idEstado` = "3",`detalle`=:detalleDoc WHERE `expediente`.`idExp` = :idDoc'
      );
      $consulta ->execute(array(
        'idDoc'=> $idDoc,
        'detalleDoc'=>$detalle
      ));
      return $consulta;
    }

    public function derivar($conexion,$remitente,$nomArea,$mensaje,$idDoc){
      $consulta=$conexion->prepare(
        'UPDATE `expediente` SET `remitente` = :remitente,`idArea`=:nomArea,`idEstado` ="1",`mensaje`=:mensaje WHERE `expediente`.`idExp` = :idDoc'
      );
      $consulta ->execute(array(
        ':remitente'=>$remitente,
        ':nomArea'=>$nomArea,
        ':mensaje'=>$mensaje,
        ':idDoc'=> $idDoc
      ));
      
      return $consulta;
    }
    public function detalle($conexion,$detalle,$idDoc){
      $consulta=$conexion->prepare(
        'UPDATE `expediente` SET `detalle` = :detalle WHERE `expediente`.`idExp` = :idDoc'
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
      UPDATE `expediente` SET `idExp`=:nExp, `fechaExp`=:fecha,`asuntoExp`=:asunto ,`idArea`=:nArea WHERE `expediente`.`idExp`=:nExpAntes');
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
