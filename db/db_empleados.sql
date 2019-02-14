# Base de datos.
# ------------------------------------------------------------

DROP DATABASE IF EXISTS db_empleados;
CREATE DATABASE db_empleados;
USE db_empleados;

# Tablas
# Tabla empleados.
# ------------------------------------------------------------

DROP TABLE IF EXISTS `empleados`;

CREATE TABLE `empleados` (
	`tipo_codigo` varchar(25) NOT NULL,
	`codigo` varchar(10) NOT NULL,
	`nombres` varchar(50) NOT NULL,
	`lugar_nacimiento` varchar(30) NOT NULL,
	`fecha_nacimiento` varchar(30) NOT NULL,
	`direccion` varchar(50) NOT NULL,
	`telefono` varchar(10) NOT NULL,
	`email` varchar(250) NOT NULL,
	`user` varchar(250) NOT NULL,
	`pass` varchar(250) NOT NULL,
	`puesto` varchar(15) NOT NULL,
	`jefe` varchar(250) NOT NULL,
	`estado` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
);


INSERT INTO `empleados` (`tipo_codigo`, `codigo`, `nombres`, `lugar_nacimiento`, `fecha_nacimiento`, `direccion`, `telefono`, `email`, `user`, `pass`, `puesto`, `jefe`, `estado`)
VALUES
	('Cedula','1033766679','Sebastian Rodriguez','Colombia','23-07-1994','CL 52B SUR 24 45 IN 22 AP 448','3218555688','jean.desarrollo@gmail.com','admin','$2y$10$lH5DIxAL0rrDW13Y5WxifeXv/1FVq5M46.s09HbuoMarz5PEIOyPu','Gerente','Empresa',1),
	('Cedula','23890756','Tatiana Guerreo','Argentina','09-09-1998','DAG 50 A SUR #28-90','3214307890','tati.guerrero@corre.com','tatiana','$2y$10$zmQiH3eXaeeSln8dtFWn1easGpiNaL21k3Zg8ipCngyBW.7LOm1hm','Cordinador','Jefe de Recursos Humanos',3),
	('Cedula','339978','TestPHP','Estonia','09-03-1994','Estonia','450987568','testphp@correo.com','testphp','$2y$10$kDvph87akBTDdUWO4QOke.Igcdc.3M08jVnIJ.lOAQ4ATh1ooLFKK','Operario','Jefe de Produccion',2),
	('Cedula','79890321','Jean Paul Agredo','Ecuador','24-03-2000','CARRERA 30 #87-90','7141712','paul.agredo@gmail.com','paul','$2y$10$iRkLk/y8R.kzt/xw7unw4uGjYqcAtfjcJ8aNUb4MUCNvJAGKe/yjK','Operario','Jefe Programacion',2);
