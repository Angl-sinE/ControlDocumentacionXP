-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2015 a las 06:11:53
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sistemagestionproyectosav`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casosdeuso`
--

CREATE TABLE IF NOT EXISTS `casosdeuso` (
  `idCasoDeUso` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCasoUso` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `accionCasoUso` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `preCondicion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `postCondicion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `flujoNormal` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `flujoAlternativo` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `idRs` int(11) NOT NULL,
  `idDiseno` int(11) NOT NULL,
  `activoCu` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idCasoDeUso`),
  KEY `idRolDeSistema` (`idRs`,`idDiseno`),
  KEY `idDiseno` (`idDiseno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriasproyecto`
--

CREATE TABLE IF NOT EXISTS `categoriasproyecto` (
  `idCategorias` int(11) NOT NULL AUTO_INCREMENT,
  `categoriaNombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionCategoria` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activoCp` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idCategorias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codificacion`
--

CREATE TABLE IF NOT EXISTS `codificacion` (
  `idCodificacion` int(11) NOT NULL AUTO_INCREMENT,
  `confirmada` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'no',
  `idProyecto` int(11) NOT NULL,
  PRIMARY KEY (`idCodificacion`),
  KEY `fk_Codificacion_Proyecto1_idx` (`idProyecto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagramadiseno`
--

CREATE TABLE IF NOT EXISTS `diagramadiseno` (
  `idDiagrama` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoDiagrama` int(11) NOT NULL,
  `diagrama` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `idDiseno` int(11) NOT NULL,
  `activoDd` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idDiagrama`),
  KEY `idTipoDiagrama` (`idTipoDiagrama`,`idDiseno`),
  KEY `idDiseno` (`idDiseno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagramatipo`
--

CREATE TABLE IF NOT EXISTS `diagramatipo` (
  `idDiagramaTipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreDiagrama` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `funcionDiagrama` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
  `activoDt` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idDiagramaTipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diseño`
--

CREATE TABLE IF NOT EXISTS `diseño` (
  `idDiseno` int(11) NOT NULL AUTO_INCREMENT,
  `confirmada` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'no',
  `idProyecto` int(11) NOT NULL,
  PRIMARY KEY (`idDiseno`),
  KEY `fk_Diseño_Proyecto1_idx` (`idProyecto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiasusuario`
--

CREATE TABLE IF NOT EXISTS `historiasusuario` (
  `idHistoriasUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreHistoria` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionHistoria` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `iteracion` int(11) NOT NULL,
  `prioridad` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `idPlanificacion` int(11) NOT NULL,
  `activoH` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idHistoriasUsuario`),
  KEY `idProyecto` (`idPlanificacion`),
  KEY `idPlanificacion` (`idPlanificacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lenguajecodificacion`
--

CREATE TABLE IF NOT EXISTS `lenguajecodificacion` (
  `idLenguaje` int(11) NOT NULL AUTO_INCREMENT,
  `idCodificacion` int(11) NOT NULL,
  `lenguajes` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
  `activoL` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idLenguaje`),
  KEY `idCodificacion` (`idCodificacion`,`lenguajes`(255)),
  KEY `idLenguajeTipo` (`lenguajes`(255))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lenguajetipo`
--

CREATE TABLE IF NOT EXISTS `lenguajetipo` (
  `idLenguajeTipo` int(11) NOT NULL AUTO_INCREMENT,
  `lenguajeNombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `lenguajeTipo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `lenguajeDescripcion` varchar(700) COLLATE utf8_spanish_ci NOT NULL,
  `activoLt` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idLenguajeTipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planificacion`
--

CREATE TABLE IF NOT EXISTS `planificacion` (
  `idPlanificacion` int(11) NOT NULL AUTO_INCREMENT,
  `confirmada` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'no',
  `idProyecto` int(11) NOT NULL,
  PRIMARY KEY (`idPlanificacion`),
  KEY `fk_Planificacion_Proyecto1_idx` (`idProyecto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `idProyecto` int(11) NOT NULL AUTO_INCREMENT,
  `nombreProyecto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionProyecto` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `categoriaProyecto` int(45) NOT NULL,
  `categoriaOtro` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaProyecto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultimaEdicionProyecto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activoProyecto` int(11) DEFAULT '1',
  `selectProyecto` varchar(11) COLLATE utf8_spanish_ci DEFAULT 'n',
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idProyecto`),
  UNIQUE KEY `nombreProyecto` (`nombreProyecto`),
  KEY `fk_Proyecto_Usuario_Rol1_idx` (`idUsuario`),
  KEY `categoriasProyecto` (`categoriaProyecto`),
  KEY `categoriasProyecto_2` (`categoriaProyecto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=44 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

CREATE TABLE IF NOT EXISTS `pruebas` (
  `idPruebas` int(11) NOT NULL AUTO_INCREMENT,
  `confirmada` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'no',
  `idProyecto` int(11) NOT NULL,
  PRIMARY KEY (`idPruebas`),
  KEY `idProyecto` (`idProyecto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebasusuario`
--

CREATE TABLE IF NOT EXISTS `pruebasusuario` (
  `idPruebasUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idHistoriaUsuario` int(11) NOT NULL,
  `tipoPrueba` int(11) NOT NULL,
  `revisiones` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `resultadoEsperado` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `resultadoObtenido` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `idPruebas` int(11) NOT NULL,
  `activoPu` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idPruebasUsuario`),
  KEY `fk_Pruebas_Proyecto1_idx` (`idPruebas`),
  KEY `idHistoriaAsociada` (`idHistoriaUsuario`),
  KEY `idTipoPrueba` (`tipoPrueba`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebatipo`
--

CREATE TABLE IF NOT EXISTS `pruebatipo` (
  `idPruebaTipo` int(11) NOT NULL AUTO_INCREMENT,
  `pruebaNombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `pruebaDescripcion` varchar(700) COLLATE utf8_spanish_ci NOT NULL,
  `activoPt` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idPruebaTipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendatutorial`
--

CREATE TABLE IF NOT EXISTS `recomendatutorial` (
  `idRecomenda` int(11) NOT NULL AUTO_INCREMENT,
  `idRolUser` int(11) NOT NULL,
  `idTutorial` int(11) NOT NULL,
  `favorito` int(11) DEFAULT '0',
  PRIMARY KEY (`idRecomenda`),
  KEY `fk_RecomiendaGuiaUser_UsuarioRol1_idx` (`idRolUser`),
  KEY `fk_RecomendaTutorial_Tutorial1_idx` (`idTutorial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requerimientos`
--

CREATE TABLE IF NOT EXISTS `requerimientos` (
  `idRequerimientos` int(11) NOT NULL AUTO_INCREMENT,
  `funcionales` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `noFuncionales` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `idPlanificacion` int(11) NOT NULL,
  `activoReq` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idRequerimientos`),
  KEY `idProyecto` (`idPlanificacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado`
--

CREATE TABLE IF NOT EXISTS `resultado` (
  `idResultado` int(11) NOT NULL AUTO_INCREMENT,
  `tareas_activadas` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `edicionFinalProyecto` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `idPlanificacion` int(11) NOT NULL,
  `idCodificacion` int(11) NOT NULL,
  `idDiseño` int(11) NOT NULL,
  `idPruebas` int(11) NOT NULL,
  PRIMARY KEY (`idResultado`),
  KEY `fk_Resultado_Codificacion1_idx` (`idCodificacion`),
  KEY `fk_Resultado_Pruebas1_idx` (`idPruebas`),
  KEY `fk_Resultado_Planificacion1_idx` (`idPlanificacion`),
  KEY `fk_Resultado_Diseño1_idx` (`idDiseño`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `idRoles` int(11) NOT NULL AUTO_INCREMENT,
  `tipos` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idRoles`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolesdesistema`
--

CREATE TABLE IF NOT EXISTS `rolesdesistema` (
  `idRolesDeSistema` int(11) NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `funcionRol` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `idDiseno` int(11) NOT NULL,
  `activoRs` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idRolesDeSistema`),
  KEY `idDiseno` (`idDiseno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE IF NOT EXISTS `tareas` (
  `idTareas` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTarea` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `categoriaTarea` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionTarea` varchar(2500) COLLATE utf8_spanish_ci NOT NULL,
  `prioridadTarea` int(11) DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`idTareas`),
  UNIQUE KEY `nombreTarea_UNIQUE` (`nombreTarea`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareasusuario`
--

CREATE TABLE IF NOT EXISTS `tareasusuario` (
  `id_tareasProyecto` int(11) NOT NULL AUTO_INCREMENT,
  `prioridad` int(11) NOT NULL,
  `idTareas` int(11) NOT NULL,
  `idRolUser` int(11) NOT NULL,
  PRIMARY KEY (`id_tareasProyecto`),
  KEY `fk_TareasProyecto_Tareas1_idx` (`idTareas`),
  KEY `fk_TareasUsuario_UsuarioRol1_idx` (`idRolUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutorial`
--

CREATE TABLE IF NOT EXISTS `tutorial` (
  `idTutorial` int(11) NOT NULL AUTO_INCREMENT,
  `contenidoTutorial` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
  `nombreTutorial` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `categoriaTutorial` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fuenteTutorial` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagenTutorial` varchar(145) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idTutorial`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `uemail` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `upassword` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `uname` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `ulastname` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`uemail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariorol`
--

CREATE TABLE IF NOT EXISTS `usuariorol` (
  `idRolUser` int(11) NOT NULL AUTO_INCREMENT,
  `activo` int(11) DEFAULT '1',
  `idUsuario` int(11) NOT NULL,
  `idRoles` int(11) NOT NULL,
  PRIMARY KEY (`idRolUser`),
  KEY `fk_Usuario_Rol_Usuario1_idx` (`idUsuario`),
  KEY `fk_Usuario_Rol_Roles1_idx` (`idRoles`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=12 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `casosdeuso`
--
ALTER TABLE `casosdeuso`
  ADD CONSTRAINT `casosdeuso_ibfk_1` FOREIGN KEY (`idRs`) REFERENCES `rolesdesistema` (`idRolesDeSistema`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `casosdeuso_ibfk_2` FOREIGN KEY (`idDiseno`) REFERENCES `diseño` (`idDiseno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `codificacion`
--
ALTER TABLE `codificacion`
  ADD CONSTRAINT `fk_Codificacion_Proyecto1` FOREIGN KEY (`idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `diagramadiseno`
--
ALTER TABLE `diagramadiseno`
  ADD CONSTRAINT `diagramadiseno_ibfk_1` FOREIGN KEY (`idTipoDiagrama`) REFERENCES `diagramatipo` (`idDiagramaTipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diagramadiseno_ibfk_2` FOREIGN KEY (`idDiseno`) REFERENCES `diseño` (`idDiseno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `diseño`
--
ALTER TABLE `diseño`
  ADD CONSTRAINT `fk_Diseño_Proyecto1` FOREIGN KEY (`idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historiasusuario`
--
ALTER TABLE `historiasusuario`
  ADD CONSTRAINT `historiasusuario_ibfk_1` FOREIGN KEY (`idPlanificacion`) REFERENCES `planificacion` (`idPlanificacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lenguajecodificacion`
--
ALTER TABLE `lenguajecodificacion`
  ADD CONSTRAINT `lenguajecodificacion_ibfk_1` FOREIGN KEY (`idCodificacion`) REFERENCES `codificacion` (`idCodificacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `planificacion`
--
ALTER TABLE `planificacion`
  ADD CONSTRAINT `fk_Planificacion_Proyecto1` FOREIGN KEY (`idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `fk_Proyecto_Usuario_Rol1` FOREIGN KEY (`idUsuario`) REFERENCES `usuariorol` (`idRolUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proyecto_ibfk_1` FOREIGN KEY (`categoriaProyecto`) REFERENCES `categoriasproyecto` (`idCategorias`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD CONSTRAINT `pruebas_ibfk_1` FOREIGN KEY (`idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pruebasusuario`
--
ALTER TABLE `pruebasusuario`
  ADD CONSTRAINT `fk_Pruebas_Proyecto1` FOREIGN KEY (`idPruebas`) REFERENCES `pruebas` (`idPruebas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pruebasusuario_ibfk_1` FOREIGN KEY (`idHistoriaUsuario`) REFERENCES `historiasusuario` (`idHistoriasUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pruebasusuario_ibfk_2` FOREIGN KEY (`tipoPrueba`) REFERENCES `pruebatipo` (`idPruebaTipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recomendatutorial`
--
ALTER TABLE `recomendatutorial`
  ADD CONSTRAINT `fk_RecomendaTutorial_Tutorial1` FOREIGN KEY (`idTutorial`) REFERENCES `tutorial` (`idTutorial`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_RecomiendaGuiaUser_UsuarioRol1` FOREIGN KEY (`idRolUser`) REFERENCES `usuariorol` (`idRolUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `requerimientos`
--
ALTER TABLE `requerimientos`
  ADD CONSTRAINT `requerimientos_ibfk_1` FOREIGN KEY (`idPlanificacion`) REFERENCES `planificacion` (`idPlanificacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `resultado`
--
ALTER TABLE `resultado`
  ADD CONSTRAINT `fk_Resultado_Pruebas1` FOREIGN KEY (`idPruebas`) REFERENCES `pruebas` (`idPruebas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Resultado_Codificacion1` FOREIGN KEY (`idCodificacion`) REFERENCES `codificacion` (`idCodificacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Resultado_Diseño1` FOREIGN KEY (`idDiseño`) REFERENCES `diseño` (`idDiseno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Resultado_Planificacion1` FOREIGN KEY (`idPlanificacion`) REFERENCES `planificacion` (`idPlanificacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rolesdesistema`
--
ALTER TABLE `rolesdesistema`
  ADD CONSTRAINT `rolesdesistema_ibfk_1` FOREIGN KEY (`idDiseno`) REFERENCES `diseño` (`idDiseno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuariorol`
--
ALTER TABLE `usuariorol`
  ADD CONSTRAINT `fk_Usuario_Rol_Roles1` FOREIGN KEY (`idRoles`) REFERENCES `roles` (`idRoles`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Usuario_Rol_Usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
