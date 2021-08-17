-- Crear tabla
CREATE TABLE `tareas` (
	`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(150) NOT NULL,
	`descripcion` TEXT NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci';

ALTER TABLE `tareas`
	ADD COLUMN `activo` TINYINT(1) UNSIGNED NULL DEFAULT 1 AFTER `descripcion`;
