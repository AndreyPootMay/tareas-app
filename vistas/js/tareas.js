/**
 * Maneja el estado de edición de una tarea
 * @return  {void}
 */
$(".tablas").on("click", ".btnEditarTarea", function () {
    let idTarea = $(this).attr('idTarea');

    let datos = new FormData();
    datos.append("idTarea", idTarea);

    $.ajax({
        url: "ajax/tareas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            console.table(response);
            $("#editarTarea").val(response.Tarea);
            $("#idTarea").val(response.id);
            $("#editar_nombre").val(response.nombre);
            $("#editar_descripcion").val(response.descripcion);
        }
    });
});

$(".tablas").on("click", ".btnEliminarTarea", function () {
    let idTarea = $(this).attr("idTarea");

    new swal({
        icon: 'warning',
        title: '¿Está seguro de borrar la Tarea?',
        text: '¡Si no lo está puede cancelar la acción!',
    }).then(function (result) {
        if (result === true) {
            window.location = "index.php?ruta=tareas&idTarea=" + idTarea;
        }
    }).catch(e => {
        console.log(e);
    })
});
