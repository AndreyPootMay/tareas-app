<?php

class PlantillaControlador
{
    /**
     * Inicia la plantilla base para no repetir código
     * @return mixed
     */
    public function actPlantilla()
    {
        include 'vistas/plantilla.php';
    }
}
