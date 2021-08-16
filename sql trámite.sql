create database if not exists `mejorado`;

use `mejorado`;

CREATE TABLE if not exists `area`(
    `idArea` int NOT NULL auto_increment,
    `nomArea` varchar(20) NOT NULL,
    `codArea` varchar(20) NOT NULL,
    `rol` varchar(20) NOT NULL,
    PRIMARY KEY(`idArea`)
)AUTO_INCREMENT=1;
INSERT INTO `area` (`idArea`, `nomArea`,`codArea`,`rol`)
 VALUES (NULL, 'Administrador','9999','Administrador'), 
 (NULL, 'Mesa de Partes','2424','Area'),
 (NULL, 'Informática','1234','Area');

CREATE TABLE if not exists `tipoUsuario`(
    `idTipoUser` int not null auto_increment,
    `descTipoUser` varchar(20) NOT NULL,
    PRIMARY KEY(`idTipoUser`)
)AUTO_INCREMENT=1;

INSERT INTO `tipousuario` (`idTipoUser`, `descTipoUser`) VALUES (NULL, 'Normal'), (NULL, 'Jurídico');

CREATE TABLE if not exists `usuario`(
    `idUser` int NOT NULL auto_increment,
    `dni` int Not null,
    `nomUser` varchar(30) not null,
    `apeUser` varchar(30) not null,
    `dirUser` varchar(40) not null,
    `telUser` varchar(10) not null,
    `correo` varchar(30) not null,
    `idTipoUser` int not null,
    `ruc` varchar(30),
    `razonsocial`varchar(30),
    PRIMARY KEY(`idUser`),
    FOREIGN KEY (`idTipoUser`) REFERENCES tipoUsuario(`idTipoUser`)
)auto_increment=1;

CREATE TABLE `estadoExp`(
    `idEstado` int not null auto_increment,
    `nomEstado` varchar(20) not null,
    PRIMARY KEY(`idEstado`)
)auto_increment=1;

INSERT INTO `estadoExp` (`idEstado`, `nomEstado`) VALUES (NULL, 'Nuevo'), (NULL, 'Abierto'),(NULL, 'Completado'),(NULL, 'Por evaluar'),(NULL, 'Rechazado');


CREATE TABLE `tipoExp`(
    `idTipoExp` int not null auto_increment,
    `descTipoExp` varchar(20),
    PRIMARY KEY(`idTipoExp`)
)auto_increment=1;

INSERT INTO `tipoexp` (`idTipoExp`, `descTipoExp`) VALUES (NULL, 'Solicitud'), (NULL, 'Oficio');

CREATE TABLE `archivoExp`(
    `idArchivo` int not null auto_increment,
    `nomArchivo` varchar(30),
    `tamArchivo` varchar(30),
    `tipArchivo` varchar(30),
    `contenido`varchar(30),
    PRIMARY KEY(`idArchivo`)
)auto_increment=1;


CREATE TABLE `recepcion`(
    `id` INT(4) not null auto_increment,
    `nomRec` varchar(20) not null,
    PRIMARY key(`id`)
)auto_increment=1;

INSERT INTO `recepcion` (`id`, `nomRec`) VALUES (NULL, 'Virtual'), (NULL, 'Fisico');


CREATE TABLE `expediente`(
    `idExp` int not null auto_increment,
    `idUser` int not null,
    `idRecepcion` int not null,
    `idArea` int not null,
    `idTipoExp` int not null,
    `idEstado` int not null,
    `idarchivo` int not null,
    `fechaExp` date,
    `remitente` varchar(30) not null,
    `asuntoExp` varchar(30) not null,
    `detalle` varchar(1000),
    `mensaje` varchar(100),

    PRIMARY KEY(`idExp`),
    FOREIGN KEY (`idUser`) REFERENCES usuario(`idUser`),
    FOREIGN KEY(`idArea`) REFERENCES area(`idArea`),
    FOREIGN KEY(`idTipoExp`) REFERENCES tipoExp(`idTipoExp`),
    FOREIGN KEY(`idEstado`) REFERENCES estadoExp(`idEstado`),
    FOREIGN KEY(`idArchivo`) REFERENCES archivoExp(`idArchivo`)  
)auto_increment=1;


CREATE TABLE `mdpvirtual` ( 
    `IDmdpV` INT(4) NOT NULL AUTO_INCREMENT , 
    `idUser` INT(4) NOT NULL , 
    `idArea` INT(4) NOT NULL , 
    `idTipoExp` INT(4) NOT NULL , 
    `idEstado` INT(4) NOT NULL , 
    `fechaV` DATE NOT NULL , 
    `remitente` VARCHAR(40) NOT NULL , 
    `asuntoV` VARCHAR(100) NOT NULL , 
    `detalle` VARCHAR(100) NOT NULL , 
    PRIMARY KEY (`IDmdpV`)
    ) ENGINE = InnoDB;