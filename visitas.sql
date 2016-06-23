/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : visitas

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-06-22 23:07:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cargo
-- ----------------------------
DROP TABLE IF EXISTS `cargo`;
CREATE TABLE `cargo` (
  `Cod_Cargo` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) DEFAULT '',
  PRIMARY KEY (`Cod_Cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cargo
-- ----------------------------
INSERT INTO `cargo` VALUES ('1', 'Administrador');
INSERT INTO `cargo` VALUES ('2', 'Promotor');

-- ----------------------------
-- Table structure for carreras
-- ----------------------------
DROP TABLE IF EXISTS `carreras`;
CREATE TABLE `carreras` (
  `Cod_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) DEFAULT '',
  `Usuario` varchar(20) DEFAULT '',
  `Fec_Mod` datetime DEFAULT NULL,
  `Fec_Reg` datetime DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Cod_carrera`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of carreras
-- ----------------------------
INSERT INTO `carreras` VALUES ('1', 'Ing. de Sistemas', '', null, null, null);
INSERT INTO `carreras` VALUES ('2', 'Ing. Industrial', '', null, null, null);

-- ----------------------------
-- Table structure for distrito
-- ----------------------------
DROP TABLE IF EXISTS `distrito`;
CREATE TABLE `distrito` (
  `Cod_Distrito` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) DEFAULT '',
  `Fec_Mod` datetime DEFAULT NULL,
  `Fec_Reg` datetime DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  `Region` varchar(50) DEFAULT '',
  PRIMARY KEY (`Cod_Distrito`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of distrito
-- ----------------------------
INSERT INTO `distrito` VALUES ('1', 'Ate', null, null, null, '');
INSERT INTO `distrito` VALUES ('2', 'Villa El Salvador', null, null, null, '');

-- ----------------------------
-- Table structure for motivo
-- ----------------------------
DROP TABLE IF EXISTS `motivo`;
CREATE TABLE `motivo` (
  `Cod_Motivo` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) DEFAULT '',
  `Fec_Mod` datetime DEFAULT NULL,
  `Fec_Reg` datetime DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Cod_Motivo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of motivo
-- ----------------------------
INSERT INTO `motivo` VALUES ('1', 'Por Su ubicacion', null, null, null);
INSERT INTO `motivo` VALUES ('2', 'Por su prestigio', null, null, null);

-- ----------------------------
-- Table structure for motivo_visita
-- ----------------------------
DROP TABLE IF EXISTS `motivo_visita`;
CREATE TABLE `motivo_visita` (
  `Cod_Motivo` int(11) NOT NULL,
  `Cod_persona` int(11) NOT NULL,
  `Id_Visita` int(11) NOT NULL,
  PRIMARY KEY (`Cod_Motivo`,`Cod_persona`,`Id_Visita`),
  KEY `FK__Motivo_Visita__3E52440B` (`Cod_persona`,`Id_Visita`),
  CONSTRAINT `FK__Motivo_Visita__3E52440B` FOREIGN KEY (`Cod_persona`, `Id_Visita`) REFERENCES `visita` (`Cod_persona`, `Id_Visita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK__Motivo_Vi__Cod_M__3F466844` FOREIGN KEY (`Cod_Motivo`) REFERENCES `motivo` (`Cod_Motivo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of motivo_visita
-- ----------------------------

-- ----------------------------
-- Table structure for pago_estudios
-- ----------------------------
DROP TABLE IF EXISTS `pago_estudios`;
CREATE TABLE `pago_estudios` (
  `Cod_pago_estudio` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) DEFAULT '',
  `Fec_Mod` datetime DEFAULT NULL,
  `Fec_Reg` datetime DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Cod_pago_estudio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pago_estudios
-- ----------------------------
INSERT INTO `pago_estudios` VALUES ('1', 'Mis padres', null, null, null);
INSERT INTO `pago_estudios` VALUES ('2', 'La empresa donde trabajo', null, null, null);

-- ----------------------------
-- Table structure for persona
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `Cod_persona` int(11) NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(100) DEFAULT '',
  `Domicilio` longtext,
  `Correo` varchar(100) DEFAULT '',
  `Telefono` char(10) DEFAULT '',
  `Celular` char(9) DEFAULT '',
  `Edad` int(11) DEFAULT NULL,
  `Sexo` char(1) DEFAULT '',
  `Materno` varchar(50) DEFAULT '',
  `Paterno` varchar(50) DEFAULT '',
  `Cod_Distrito` int(11) DEFAULT NULL,
  PRIMARY KEY (`Cod_persona`),
  KEY `FK__Persona__Cod_Dis__403A8C7D` (`Cod_Distrito`),
  CONSTRAINT `FK__Persona__Cod_Dis__403A8C7D` FOREIGN KEY (`Cod_Distrito`) REFERENCES `distrito` (`Cod_Distrito`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of persona
-- ----------------------------

-- ----------------------------
-- Table structure for postulante_preparacion
-- ----------------------------
DROP TABLE IF EXISTS `postulante_preparacion`;
CREATE TABLE `postulante_preparacion` (
  `Cod_pos_prepa` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) DEFAULT '',
  PRIMARY KEY (`Cod_pos_prepa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of postulante_preparacion
-- ----------------------------
INSERT INTO `postulante_preparacion` VALUES ('1', 'En una academia');
INSERT INTO `postulante_preparacion` VALUES ('2', 'Con mis Amigos');

-- ----------------------------
-- Table structure for referencia
-- ----------------------------
DROP TABLE IF EXISTS `referencia`;
CREATE TABLE `referencia` (
  `Cod_referencia` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) DEFAULT '',
  PRIMARY KEY (`Cod_referencia`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of referencia
-- ----------------------------
INSERT INTO `referencia` VALUES ('1', 'Radio');
INSERT INTO `referencia` VALUES ('2', 'TV');

-- ----------------------------
-- Table structure for referencias_visitadas
-- ----------------------------
DROP TABLE IF EXISTS `referencias_visitadas`;
CREATE TABLE `referencias_visitadas` (
  `Cod_referencia` int(11) NOT NULL,
  `Cod_persona` int(11) NOT NULL,
  `Descripcion` varchar(50) DEFAULT '',
  `Id_Visita` int(11) NOT NULL,
  PRIMARY KEY (`Cod_referencia`,`Cod_persona`,`Id_Visita`),
  KEY `FK__Referencias_visi__412EB0B6` (`Cod_persona`,`Id_Visita`),
  CONSTRAINT `FK__Referencias_visi__412EB0B6` FOREIGN KEY (`Cod_persona`, `Id_Visita`) REFERENCES `visita` (`Cod_persona`, `Id_Visita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK__Referenci__Cod_r__4222D4EF` FOREIGN KEY (`Cod_referencia`) REFERENCES `referencia` (`Cod_referencia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of referencias_visitadas
-- ----------------------------

-- ----------------------------
-- Table structure for tipo_visita
-- ----------------------------
DROP TABLE IF EXISTS `tipo_visita`;
CREATE TABLE `tipo_visita` (
  `Cod_Tipo_Visita` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) DEFAULT '',
  `Estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Cod_Tipo_Visita`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipo_visita
-- ----------------------------
INSERT INTO `tipo_visita` VALUES ('1', 'Presencial', null);
INSERT INTO `tipo_visita` VALUES ('2', 'Vía Telefónica', null);

-- ----------------------------
-- Table structure for universidades
-- ----------------------------
DROP TABLE IF EXISTS `universidades`;
CREATE TABLE `universidades` (
  `Cod_Universidad` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) DEFAULT '',
  `Estado` tinyint(1) DEFAULT NULL,
  `Fec_Reg` datetime DEFAULT NULL,
  `Fec_Mod` datetime DEFAULT NULL,
  `Usuario` varchar(20) DEFAULT '',
  PRIMARY KEY (`Cod_Universidad`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of universidades
-- ----------------------------
INSERT INTO `universidades` VALUES ('2', 'Univ. de Lima', null, null, null, '');
INSERT INTO `universidades` VALUES ('3', 'UPC', null, null, null, '');

-- ----------------------------
-- Table structure for universidades_postuladas
-- ----------------------------
DROP TABLE IF EXISTS `universidades_postuladas`;
CREATE TABLE `universidades_postuladas` (
  `Cod_Universidad` int(11) NOT NULL,
  `Cod_persona` int(11) NOT NULL,
  `Descripcion` varchar(50) DEFAULT '',
  `Id_Visita` int(11) NOT NULL,
  PRIMARY KEY (`Cod_Universidad`,`Cod_persona`,`Id_Visita`),
  KEY `FK__Universidades_po__4316F928` (`Cod_persona`,`Id_Visita`),
  CONSTRAINT `FK__Universidades_po__4316F928` FOREIGN KEY (`Cod_persona`, `Id_Visita`) REFERENCES `visita` (`Cod_persona`, `Id_Visita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK__Universid__Cod_U__440B1D61` FOREIGN KEY (`Cod_Universidad`) REFERENCES `universidades` (`Cod_Universidad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of universidades_postuladas
-- ----------------------------

-- ----------------------------
-- Table structure for universidades_visitadas
-- ----------------------------
DROP TABLE IF EXISTS `universidades_visitadas`;
CREATE TABLE `universidades_visitadas` (
  `Cod_persona` int(11) NOT NULL,
  `Cod_Universidad` int(11) NOT NULL,
  `Descripcion` varchar(50) DEFAULT '',
  `Id_Visita` int(11) NOT NULL,
  PRIMARY KEY (`Cod_Universidad`,`Cod_persona`,`Id_Visita`),
  KEY `FK__Universidades_vi__45F365D3` (`Cod_persona`,`Id_Visita`),
  CONSTRAINT `FK__Universidades_vi__45F365D3` FOREIGN KEY (`Cod_persona`, `Id_Visita`) REFERENCES `visita` (`Cod_persona`, `Id_Visita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK__Universid__Cod_U__44FF419A` FOREIGN KEY (`Cod_Universidad`) REFERENCES `universidades` (`Cod_Universidad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of universidades_visitadas
-- ----------------------------

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `Cod_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(20) DEFAULT '',
  `Cod_Cargo` int(11) DEFAULT NULL,
  `Fec_Mod` char(18) DEFAULT '',
  `Fec_Reg` char(18) DEFAULT '',
  `Estado` tinyint(1) DEFAULT NULL,
  `Clave` varchar(100) DEFAULT '',
  `Apellidos` varchar(100) DEFAULT '',
  `Nombres` varchar(50) DEFAULT '',
  PRIMARY KEY (`Cod_Usuario`),
  KEY `FK__Usuarios__Cod_Ca__46E78A0C` (`Cod_Cargo`),
  CONSTRAINT `FK__Usuarios__Cod_Ca__46E78A0C` FOREIGN KEY (`Cod_Cargo`) REFERENCES `cargo` (`Cod_Cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('4', 'rcarpio', '1', '', '', null, '123', 'CARPIO', 'RENZO');
INSERT INTO `usuarios` VALUES ('5', 'jsotomayor', '1', '', '', null, '123', 'SOTOMAYOR', 'JOSE');
INSERT INTO `usuarios` VALUES ('6', 'LJULIAN', '2', '', '', null, '123', 'JULIAN', 'LUIS');

-- ----------------------------
-- Table structure for visita
-- ----------------------------
DROP TABLE IF EXISTS `visita`;
CREATE TABLE `visita` (
  `Id_Visita` int(11) NOT NULL AUTO_INCREMENT,
  `Cod_persona` int(11) NOT NULL,
  `Descripción_de_Colegio` longtext,
  `Tipo_Colegio` varchar(45) DEFAULT NULL,
  `Turno` char(1) DEFAULT '',
  `Secundaria_año` char(4) DEFAULT '',
  `Cod_carrera` int(11) DEFAULT NULL,
  `Observacion_Pago` varchar(50) DEFAULT '',
  `Cod_pago_estudio` int(11) DEFAULT NULL,
  `Situacion_Actual` varchar(50) DEFAULT '',
  `Cod_Tipo_Visita` int(11) DEFAULT NULL,
  `Fec_Mod` datetime DEFAULT NULL,
  `Fec_Reg` datetime DEFAULT NULL,
  `Cod_pos_prepa` int(11) DEFAULT NULL,
  `Observacion_Prepacion` varchar(50) DEFAULT '',
  `Observacion_Pos_Motivo` varchar(50) DEFAULT '',
  `Cod_Usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Visita`,`Cod_persona`),
  KEY `FK__Visita__Cod_pago__4BAC3F29` (`Cod_pago_estudio`),
  KEY `FK__Visita__Cod_Usua__47DBAE45` (`Cod_Usuario`),
  KEY `FK__Visita__Cod_carr__4CA06362` (`Cod_carrera`),
  KEY `FK__Visita__Cod_pers__4D94879B` (`Cod_persona`),
  KEY `FK__Visita__Cod_pos___49C3F6B7` (`Cod_pos_prepa`),
  KEY `FK__Visita__Cod_Tipo__4AB81AF0` (`Cod_Tipo_Visita`),
  CONSTRAINT `FK__Visita__Cod_pago__4BAC3F29` FOREIGN KEY (`Cod_pago_estudio`) REFERENCES `pago_estudios` (`Cod_pago_estudio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK__Visita__Cod_Usua__47DBAE45` FOREIGN KEY (`Cod_Usuario`) REFERENCES `usuarios` (`Cod_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK__Visita__Cod_carr__4CA06362` FOREIGN KEY (`Cod_carrera`) REFERENCES `carreras` (`Cod_carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK__Visita__Cod_pers__4D94879B` FOREIGN KEY (`Cod_persona`) REFERENCES `persona` (`Cod_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK__Visita__Cod_pos___49C3F6B7` FOREIGN KEY (`Cod_pos_prepa`) REFERENCES `postulante_preparacion` (`Cod_pos_prepa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK__Visita__Cod_Tipo__4AB81AF0` FOREIGN KEY (`Cod_Tipo_Visita`) REFERENCES `tipo_visita` (`Cod_Tipo_Visita`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of visita
-- ----------------------------
