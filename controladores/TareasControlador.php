<?php

/**
 * Clase dedicada a las funcionalidades del módulo de Tareas
 */
class TareasControlador
{
    /**
     * Añade un nuevo registro a la entidad "tareas".
     * @return mixed
     */
    public function actNuevo()
    {
        if (isset($_POST['nombre'])) {
            $datos = [
                'nombre' => $_POST['nombre'],
                'descripcion' => $_POST['descripcion'],
            ];

            $respuesta = Tareas::nuevaTarea($datos);

            if ($respuesta) {
                echo '<script>
                    new swal(
                        "Bien hecho!",
                        "¡La tarea se ha agregado correctamente!",
                        "success"
                    );
					</script>';
                
                echo '<script>
                    setInterval(() => {
                        window.location.href=window.location.href
                    }, 1000);
                    </script>';
            } else {
                echo '<script>
                    new swal(
                        "Algo falló!",
                        "La tarea no pudo ser guardada, contacte con el administrador :(",
                        "danger"
                    );
                    </script>';
                
                echo '<script>
                    setInterval(() => {
                        window.location.href=window.location.href
                    }, 1000);
                    </script>';
            }
        }
    }

    /**
     * Edita un registro de la entidad "tareas".
     * @return mixed
     */
    public function actEditar()
    {
        if (isset($_POST['editar_nombre'])) {
            $datos = [
                'id' => $_POST['idTarea'],
                'nombre' => $_POST['editar_nombre'],
                'descripcion' => $_POST['editar_descripcion'],
            ];

            $respuesta = Tareas::editarTarea($datos);

            if ($respuesta) {
                echo '<script>
                    new swal(
                        "Bien hecho!",
                        "¡La tarea se ha editado correctamente!",
                        "success"
                    );
					</script>';

                echo '<script>
                    setInterval(() => {
                        window.location.href=window.location.href
                    }, 1000);
                    </script>';
            } else {
                echo '<script>
                new swal(
                    "Algo falló!",
                    "La tarea no pudo ser editada, contacte con el administrador :(",
                    "danger"
                );
				</script>';

                echo '<script>
                setInterval(() => {
                    window.location.href=window.location.href
                }, 1000);
                </script>';
            }
        }
    }

    public function actBorrar()
    {
        if (isset($_GET['idTarea'])) {

            $datos = $_GET['idTarea'];

            $respuesta = Tareas::eliminarTarea($datos);

            if ($respuesta) {
                echo '<script>
                    new swal(
                        "Bien hecho!",
                        "¡La tarea se ha eliminado correctamente!",
                        "success"
                    );
					</script>';
                
                echo '<script>
                setInterval(() => {
                    window.location.href=`index.php`
                }, 1000);
                </script>';
            }
        }
    }

    /**
     * Busca una tarea por medio de su id.
     * @param   int  $id  id en la base de datos.
     * @return array
     */
    public static function actVerTarea(int $id): array
    {
        $tarea = Tareas::buscaTarea($id);

        return $tarea;
    }
}
