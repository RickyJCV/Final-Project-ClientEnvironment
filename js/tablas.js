$(document).ready(function () {

    $("#buscar").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#tablaCachimbas tbody>tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $("#tablaCachimbas").DataTable({
        "searching": false,
        "paging": false,
        "destroy": true,
        "ajax": "../servidor/tablaCachimba.php",
        "columns": [{
                "data": "marca"
            },
            {
                "data": "modelo"
            },
            {
                "data": "color"
            },
            {
                "data": "precio"
            },
            {
                "data": "stock"
            },

            {
                data: 'id',
                "render": function (data) {
                    return '<button type="button" class="btn btn-danger" data-idEliminar=' + data + ' data-accion="eliminar"><i class="fas fa-trash-alt" data-idEliminar=' + data + ' data-accion="eliminar"></i></button>';
                }
            },
        ]
    });
    $('#tablaCachimbas').DataTable().on("draw", function () {
        $(function () {
            $("button[data-accion='eliminar']").on("click", function (event) {
                let boton = $(event.target);

                mostrarModalEliminar(boton.attr("data-ideliminar"));
            });

            $("button[data-accion='confirmar-eliminar']").on("click", function (event) {
                let boton = $(event.target);
                eliminarCachimba(boton.attr("data-ideliminar"));
            });
        });

        function mostrarModalEliminar(idEliminar) {
            $("#botonConfirmarEliminar").attr("data-ideliminar", idEliminar);
            $("#modalEliminar").modal("show");
        }

        function eliminarCachimba(idEliminar) {
            let form = new FormData();
            console.log(idEliminar);
            form.append("id", idEliminar);
            fetch("../servidor/eliminarCachimbas.php", {
                method: "POST",
                body: form
            }).then(function () {
                $("#modalEliminar").modal("hide");
                $("td>button[data-ideliminar=" + idEliminar + "]").parent().parent().remove();
            });
        }
    })

});