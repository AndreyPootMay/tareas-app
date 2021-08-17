<?php

require_once '../controladores/TareasControlador.php';
require_once '../modelos/Tareas.php';

class AjaxTareas
{
    public $idTarea;

    /**
     * Edita una categoría por ajax.
     * @return  void
     */
    public function ajaxEditarTarea(): void
    {
        $idTarea = $this->idTarea;
        $respuesta = TareasControlador::actVerTarea($idTarea);

        echo json_encode($respuesta);
    }
}


if (isset($_POST['idTarea'])) {
    $ajaxTareas = new AjaxTareas();
    $ajaxTareas->idTarea = $_POST['idTarea'];
    $ajaxTareas->ajaxEditarTarea();
}
