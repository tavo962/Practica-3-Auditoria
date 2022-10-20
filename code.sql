DROP SCHEMA IF EXISTS personal;

-- Crea una base de datos
CREATE SCHEMA personal;

-- Selecciona la base de datos a utilizar
USE personal;

CREATE TABLE empleados(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	nombres VARCHAR( 255 ) NOT NULL,
	apellidos VARCHAR( 255 ) NOT NULL,
	email VARCHAR( 60 ) NOT NULL,
	fecha_creacion DATETIME NOT NULL,
	fecha_modificacion DATETIME NOT NULL,
	fecha_eliminacion DATETIME NOT NULL,

	PRIMARY KEY( id )
)
ENGINE = INNODB
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;