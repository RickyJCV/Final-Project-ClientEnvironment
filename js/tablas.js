$(document).ready(function() {
    $("#tablaCachimbas").DataTable({
        "ajax": "../servidor/tablaCachimba.php",
        "columns": [
            { "data": "marca" },
            { "data": "modelo" },
            { "data": "color" },
            { "data": "precio" },
            { "data": "stock" },
             {"render": $('#example tbody').on('click', 'button', function () {
  var id = $(this).attr('id'); //$(this) refers the clicked button element
  console.log(id);
  return '<button data-idEliminar="'+id+'" data-accion="eliminar">Eliminar</button>';
});
                
            
        }},
        ]
    });
});