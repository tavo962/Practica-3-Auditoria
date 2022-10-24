--  ██████╗ ██████╗ ██████╗ ███████╗███╗   ███╗ █████╗ ███╗   ██╗
-- ██╔════╝██╔═══██╗██╔══██╗██╔════╝████╗ ████║██╔══██╗████╗  ██║
-- ██║     ██║   ██║██║  ██║█████╗  ██╔████╔██║███████║██╔██╗ ██║
-- ██║     ██║   ██║██║  ██║██╔══╝  ██║╚██╔╝██║██╔══██║██║╚██╗██║
-- ╚██████╗╚██████╔╝██████╔╝███████╗██║ ╚═╝ ██║██║  ██║██║ ╚████║
--  ╚═════╝ ╚═════╝ ╚═════╝ ╚══════╝╚═╝     ╚═╝╚═╝  ╚═╝╚═╝  ╚═══╝
-- @version 1.0.0

USE unimex;

DROP TABLE IF EXISTS logs;
CREATE TABLE logs(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	nombres VARCHAR( 40 ) NOT NULL,
	apellido_paterno VARCHAR( 50 ) NOT NULL,
	apellido_materno VARCHAR( 50 ) NOT NULL,
	correo_electronico VARCHAR( 60 ) NOT NULL,
	genero ENUM( "F", "M", "O" ) NOT NULL,
	comentario VARCHAR( 5000 ) NOT NULL,
	fecha_creacion DATETIME NOT NULL,
	fecha_modificacion DATETIME NOT NULL,
	fecha_eliminacion DATETIME,

	UNIQUE( correo_electronico ),

	PRIMARY KEY( id )
)
ENGINE = INNODB
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

DROP TRIGGER  IF EXISTS kuetspali;

DELIMITER $$

CREATE TRIGGER kuetspali
    AFTER INSERT
    ON usuarios FOR EACH ROW
BEGIN
    INSERT INTO logs VALUES ( DEFAULT, NEW.nombres, NEW.apellido_paterno, NEW.apellido_materno, NEW.correo_electronico, NEW.genero, NEW.comentario, NOW(), NOW(), NULL );
END$$

DELIMITER ;