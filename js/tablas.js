$(document).ready(function () {
    var tabla = $("#tablaCachimbas").DataTable({
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

    function mostrarModalEliminar(idEliminar) {
        $("#botonConfirmarEliminar").attr("data-ideliminar", idEliminar);
        $("#modalEliminar").modal("show");
    }

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


    $("#buscar").on("keyup", function () {
        buscarCachimbas();
    });
    $("#nada").on("click", function () {
        buscarCachimbas();
    });
    $("#rojo").on("click", function () {
        buscarCachimbas();
    });
    $("#azul").on("click", function () {
        buscarCachimbas();
    });
    $("#naranja").on("click", function () {
        buscarCachimbas();
    });
    $("#negro").on("click", function () {
        buscarCachimbas();
    });


    function buscarCachimbas() {
        var value = $("#buscar").val().toLowerCase();
        var nada = $("#nada").prop("checked") ? $("#nada").val() : "";
        var valorRojo = $("#rojo").prop("checked") ? $("#rojo").val() : "";
        var valorAzul = $("#azul").prop("checked") ? $("#azul").val() : "";
        var valorNaranja = $("#naranja").prop("checked") ? $("#naranja").val() : "";
        var valorNegro = $("#negro").prop("checked") ? $("#negro").val() : "";

        $.ajax({
            url: "../servidor/filtrarCachimba.php",
            data: {
                valor: value,
                nada: nada,
                rojo: valorRojo,
                azul: valorAzul,
                naranja: valorNaranja,
                negro: valorNegro
            },
            method: "POST",
            dataType: "JSON",
            success: (function (resultado) {
                tabla.clear().draw();
                tabla.rows.add(resultado.data);
                tabla.draw();
            })
        });
    }

});