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
                    return '<button data-idEliminar="' + data + '" data-accion="eliminar">Eliminar</button>';
                }
            },
        ]
    });
});