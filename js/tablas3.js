$(document).ready(function() {
    var tabla = $("#tablaPedido").DataTable({
        "searching": false,
        "paging": false,
        "destroy": true,
        "ajax": "../servidor/tablaPedido.php",
        "columns": [{
                "data": "id_usuarios"
            },
            {
                "data": "direccion"
            },
            {
                "data": "importe"
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

    $('#tablaPedido').DataTable().on("draw", function() {
        $(function() {
            $("button[data-accion='eliminar']").on("click", function(event) {
                let boton = $(event.target);

                mostrarModalEliminar(boton.attr("data-ideliminar"));
            });

            $("button[data-accion='confirmar-eliminar']").on("click", function(event) {
                let boton = $(event.target);
                eliminarPedido(boton.attr("data-ideliminar"));
            });
        });



        function eliminarPedido(idEliminar) {
            let form = new FormData();
            console.log(idEliminar);
            form.append("id", idEliminar);
            fetch("../servidor/eliminarPedidos.php", {
                method: "POST",
                body: form
            }).then(function() {
                $("#modalEliminar").modal("hide");
                $("td>button[data-ideliminar=" + idEliminar + "]").parent().parent().remove();
            });
        }

    })


    $("#buscar").on("keyup", function() {
        buscarPedido();
    });
    $("#nada").on("click", function() {
        buscarPedido();
    });
    $("#Daniel").on("click", function() {
        buscarPedido();
    });
    $("#Pablo").on("click", function() {
        buscarPedido();
    });
    $("#Ricardo").on("click", function() {
        buscarPedido();
    });



    function buscarPedido() {
        var value = $("#buscar").val().toLowerCase();
        $.ajax({
            url: "../servidor/filtrarPedidos.php",
            data: {
                valor: value,
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