<?php
$listaTareas = Tareas::listaTareas();
?>

<div class="m-5">
    <h4>Tareas</h4>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTarea">
        <i class="fa fa-plus"></i> Nueva tarea
    </button>

    <hr>
    <table class="tablas table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaTareas as $tarea) { ?>
                <tr>
                    <th scope="row"><?= $tarea['id'] ?></th>
                    <td><?= $tarea['nombre'] ?></td>
                    <td><?= $tarea['descripcion'] ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Button group">
                            <button class="btn btn-warning btnEditarTarea" idTarea="<?= $tarea["id"] ?>" data-bs-toggle="modal" data-bs-target="#modalEditarTarea">
                                <i class="fas fa-edit"></i> Editar
                            </button>
                            <button class="btn btn-danger btnEliminarTarea" idTarea="<?= $tarea["id"] ?>">
                                <i class="fas fa-times"></i> Eliminar
                            </button>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Formulario flotante [modal] para crear tarea -->

<!-- Modal Nueva tarea -->
<div class="modal fade" id="modalTarea" tabindex="-1" aria-labelledby="modalTareaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTareaLabel">Nueva tarea</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <!-- Nombre -->
                        <div class="form-group">
                            <label for="nombre" class="form-label">Nombre</label>
                            <span class="input-group-addon"><i class="fa fa-book"></i></span>
                            <input type="text" id="nombre" name="nombre" autocomplete="off" class="form-control input-lg" placeholder="Nombre de la tarea..." required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <!-- Descripción -->
                        <label for="descripcion" class="form-label">Descripción</label>
                        <span class="input-group-addon"><i class="fa fa-pencil-square"></i></span>
                        <textarea placeholder="Descripción de la tarea..." autocomplete="off" class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                </div>
                <?php
                $crearTarea = new TareasControlador();
                $crearTarea->actNuevo();
                ?>
            </form>
        </div>
    </div>
</div>


<!-- Modal Editar tarea -->
<div class="modal fade" id="modalEditarTarea" tabindex="-1" aria-labelledby="modalEditarTarea" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarTareaLabel">Editar tarea: <span class="nombreTarea"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idTarea" id="idTarea">
                    <div class="mb-3">
                        <!-- Nombre -->
                        <div class="form-group">
                            <label for="editar_nombre" class="form-label">Nombre</label>
                            <span class="input-group-addon"><i class="fa fa-book"></i></span>
                            <input type="text" id="editar_nombre" name="editar_nombre" class="form-control input-lg" placeholder="Nombre de la tarea..." required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <!-- Descripción -->
                        <label for="editar_descripcion" class="form-label">Descripción</label>
                        <span class="input-group-addon"><i class="fa fa-pencil-square"></i></span>
                        <textarea placeholder="Descripción de la tarea..." class="form-control" name="editar_descripcion" id="editar_descripcion" rows="3"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger pull-left" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                </div>
                <?php
                $editarTarea = new TareasControlador();
                $editarTarea->actEditar();
                ?>
            </form>
        </div>
    </div>
</div>

<?php
$borrarTarea = new TareasControlador();
$borrarTarea->actBorrar();
?>