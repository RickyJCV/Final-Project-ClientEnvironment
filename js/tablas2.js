$(document).ready(function() {
    var tabla = $("#tablaUsuarios").DataTable({
        "searching": false,
        "paging": false,
        "destroy": true,
        "ajax": "../servidor/tablaUsuario.php",
        "columns": [{
                "data": "nombre"
            },
            {
                "data": "apellidos"
            },
            {
                "data": "email"
            },

            {
                data: 'id',
                "render": function(data) {
                    return '<button type="button" class="btn btn-danger" data-idEliminar=' + data + ' data-accion="eliminar"><i class="fas fa-trash-alt" data-idEliminar=' + data + ' data-accion="eliminar"></i></button>';
                }
            },
        ]
    });

    function mostrarModalEliminar(idEliminar) {
        $("#botonConfirmarEliminar").attr("data-ideliminar", idEliminar);
        $("#modalEliminar").modal("show");
    }

    $('#tablaUsuarios').DataTable().on("draw", function() {
        $(function() {
            $("button[data-accion='eliminar']").on("click", function(event) {
                let boton = $(event.target);

                mostrarModalEliminar(boton.attr("data-ideliminar"));
            });

            $("button[data-accion='confirmar-eliminar']").on("click", function(event) {
                let boton = $(event.target);
                eliminarUsuario(boton.attr("data-ideliminar"));
            });
        });



        function eliminarUsuario(idEliminar) {
            let form = new FormData();
            console.log(idEliminar);
            form.append("id", idEliminar);
            fetch("../servidor/eliminarUsuarios.php", {
                method: "POST",
                body: form
            }).then(function() {
                $("#modalEliminar").modal("hide");
                $("td>button[data-ideliminar=" + idEliminar + "]").parent().parent().remove();
            });
        }

    })


    $("#buscar").on("keyup", function() {
        buscarUsuario();
    });
    $("#nada").on("click", function() {
        buscarUsuario();
    });
    $("#Daniel").on("click", function() {
        buscarUsuario();
    });
    $("#Pablo").on("click", function() {
        buscarUsuario();
    });
    $("#Ricardo").on("click", function() {
        buscarUsuario();
    });



    function buscarUsuario() {
        var value = $("#buscar").val().toLowerCase();
        var nada = $("#nada").prop("checked") ? $("#nada").val() : "";
        var valordaniel = $("#Daniel").prop("checked") ? $("#Daniel").val() : "";
        var valorpablo = $("#Pablo").prop("checked") ? $("#Pablo").val() : "";
        var valorricardo = $("#Ricardo").prop("checked") ? $("#Ricardo").val() : "";
        $.ajax({
            url: "../servidor/filtrarUsuarios.php",
            data: {
                valor: value,
                nada: nada,
                daniel: valordaniel,
                pablo: valorpablo,
                ricardo: valorricardo,
            },
            method: "POST",
            dataType: "JSON",
            success: (function(resultado) {
                console.log("resultado")
                tabla.clear().draw();
                tabla.rows.add(resultado.data);
                tabla.draw();
            })
        });
    }

});