$(document).ready(function () {
    $("#tablaCachimbas").DataTable({
        "searching": false,
        "paging": false,
        "ajax": "../servidor/tablaCachimba.php",
        "columns": [
            { "data": "marca" },
            { "data": "modelo" },
            { "data": "color" },
            { "data": "precio" },
            { "data": "stock" },

            {
                data: 'id',
                "render": function (data) {
                    return '<button type="button" class="btn btn-danger" data-idEliminar="' + data + '" data-accion="eliminar"><i class="fas fa-trash-alt"></i></button>';
                }
            },
        ]
    });
    $("button[data-accion='eliminar']").on("click", function (event) {
        let boton = $(event.target);
        mostrarModalEliminar(boton.attr("data-ideliminar"));
    });

    $("button[data-accion='confirmar-eliminar']").on("click", function (event) {
        let boton = $(event.target);
        eliminarPelicula(boton.attr("data-ideliminar"));
    });

});


function mostrarModalEliminar(idEliminar) {
    $("#botonConfirmarEliminar").attr("data-ideliminar", idEliminar);
    $("#modalEliminar").modal("show");
}