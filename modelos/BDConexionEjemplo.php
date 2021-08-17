<?php

/**
 * Clase de conexión para la base de datos usando PDO
 */
class DbConnect
{
    /**
     * Conexión por PDO
     * @return PDO
     */
	public static function conexion()
	{
		$conexion = new PDO(
			'mysql:host=localhost;dbname=', '', ''
		);

		$conexion->exec('SET NAMES utf8');

		return $conexion;
	}
}