<?php

require 'BDConexion.php';

class Tareas
{
    public $tabla = 'tareas';

    /**
     * Obtiene una lista de tareas
     * @return array
     */
    public static function listaTareas()
    {
        $consulta = DbConnect::conexion()->prepare(
            "SELECT id, nombre, descripcion FROM tareas WHERE activo = 1"
        );

        $consulta->execute();

        return $consulta->fetchAll();
    }

    /**
     * Busca una tarea dentro de la base de datos
     * @param   int  $id  Id de la tarea
     * @return array
     */
    public static function buscaTarea(int $id)
    {
        $consulta = DbConnect::conexion()->prepare(
            "SELECT id, nombre, descripcion FROM tareas WHERE activo = 1 AND id = :id"
        );

        $consulta->bindParam(':id', $id, PDO::PARAM_STR);

        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Crea una nueva tarea, regresa un true si la tarea se
     * añadió correctamente a la base de datos.
     * @param   array  $datos  Datos del formulario
     * @return boolean
     */
    public static function nuevaTarea(array $datos)
    {
        $consulta = DbConnect::conexion()->prepare(
            "INSERT INTO tareas (nombre, descripcion) VALUES (:nombre, :descripcion)"
        );

        $consulta->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR, 25);
        $consulta->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR, 100);

        if (!$consulta->execute()) {
            print_r($consulta->errorInfo());
            die();
            return false;
        }

        return true;
    }

    /**
     * Actualiza una tarea en la base de datos.
     * @param  array  $datos
     * @return boolean
     */
    public static function editarTarea(array $datos)
    {
        $consulta = DbConnect::conexion()->prepare(
            "UPDATE tareas SET nombre = :nombre, descripcion = :descripcion WHERE id = :id"
        );

        $consulta->bindParam(':id', $datos['id'], PDO::PARAM_INT, 1);
        $consulta->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR, 25);
        $consulta->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR, 100);

        if (!$consulta->execute()) {
            print_r($consulta->errorInfo());
            die();
            return false;
        }

        return true;
    }

    /**
     * Actualiza una tarea en la base de datos.
     * @param  array  $datos
     * @return boolean
     */
    public static function eliminarTarea(int $id)
    {
        $consulta = DbConnect::conexion()->prepare(
            "UPDATE tareas SET activo = 0 WHERE id = :id"
        );

        $consulta->bindParam(':id', $id, PDO::PARAM_INT, 1);

        if (!$consulta->execute()) {
            print_r($consulta->errorInfo());
            die();
            return false;
        }

        return true;
    }
}
