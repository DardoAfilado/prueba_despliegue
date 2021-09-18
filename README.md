# prueba_netberry

1. Para el funcionamiento de la aplicación se necesita alojar el proyecto en un servidor Web Apache.
2. Se ha de crear una DB llamada "netberry" con las siguientes tablas:

_____________________________________________________________________________________________
TABLA etiquetas

CREATE TABLE `etiquetas` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(50) NOT NULL DEFAULT 'Sin nombre' COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COMMENT='Posibles etiquetas que puede tener una tarea'
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=4
;

INSERT INTO `etiquetas` (`id`, `nombre`) VALUES (1, 'PHP');
INSERT INTO `etiquetas` (`id`, `nombre`) VALUES (2, 'Javascript');
INSERT INTO `etiquetas` (`id`, `nombre`) VALUES (3, 'CSS');
_____________________________________________________________________________________________
TABLA tareas

CREATE TABLE `tareas` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(255) NOT NULL DEFAULT 'Sin nombre' COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COMMENT='Almacena las atreas a desarrollar'
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=9
_____________________________________________________________________________________________
TABLA etiquetas_tareas

CREATE TABLE `etiquetas_tareas` (
	`id_tarea` INT(11) NOT NULL DEFAULT '0',
	`id_etiqueta` INT(11) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id_tarea`, `id_etiqueta`) USING BTREE,
	INDEX `fk_etiquetas` (`id_etiqueta`) USING BTREE,
	CONSTRAINT `fk_etiquetas` FOREIGN KEY (`id_etiqueta`) REFERENCES `netberry`.`etiquetas` (`id`) ON UPDATE RESTRICT ON DELETE CASCADE,
	CONSTRAINT `fk_tareas` FOREIGN KEY (`id_tarea`) REFERENCES `netberry`.`tareas` (`id`) ON UPDATE RESTRICT ON DELETE CASCADE
)
COMMENT='Las etiquetas que posee una determinada tarea'
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;
_____________________________________________________________________________________________

3. El fichero de conexión para la DB se encuentra en:
application\config\database.php
