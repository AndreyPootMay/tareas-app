<?php

// Controladores
require 'controladores/PlantillaControlador.php';
require 'controladores/TareasControlador.php';

// Modelos
require 'modelos/Tareas.php';

$plantilla = new PlantillaControlador();
$plantilla->actPlantilla();