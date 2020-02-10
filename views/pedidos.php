<!doctype html>
<html lang="es">

<head>
    <title>Entorno Cliente</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <script src="../js/validacionUsuarios.js" defer></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Libreria de Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>

    <!-- Barra de navegacion -->
    <nav class="col-12 navbar navbar-expand-lg align-items-end bg-dark">
        <a class="navbar-brand" href="#">TIENDA CACHIMBAS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icono-desplegable"><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse text-uppercase font-weight-bold justify-content-end"
            id="navbarNavDropdown">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="usuarios.php">usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pedidos.php">pedidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cachimbas.php">cachimbas</a>
                </li>
            </ul>
        </div>
    </nav>
    




<!-- FORMULARIO VALIDACION XHR -->


<?php
$mostrarFormulario = true;
$errores = array();

$importe = "";
$direccion = "";
$id_usuarios = "";

if(count($_POST) > 0){
    
    $importe = isset($_POST["importe"])?$_POST["importe"]:"";
    $password = isset($_POST["direccion"])?$_POST["direccion"]:"";
    $id_usuarios = isset($_POST["id_usuarios"])?$_POST["id_usuarios"]:"";
    require_once "../servidor/funcionesValidacionPedido.php";
    
    $errores["importe"] = validarImporte($importe);
    $errores["direccion"] = validarDireccion($direccion);
    $errores["id_usuarios"] = validarId_usuarios($id_usuarios);


    if(count($errores["nombre"]) === 0 && count($errores["importe"]) === 0 && count($errores["direccion"]) === 0 && count($errores["id_usuarios"]) === 0 ){
        $mostrarFormulario = false;
        
        ?>
    <h1>DATOS DEL FORMULARIO</h1>
    Se ha creado correctamente el usuario

    <?php
    }
}

if($mostrarFormulario){
?>
    <span class="spinner m-3">
        <div class="dot1"></div>
        <div class="dot2"></div>
    </span>
    <div class="container-fluid">
        <form id="formulario" method="POST" action="" onsubmit="validarFormulario()">
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="direccion">Dirección *</label>
                    <input id="direccion" class="form-control" value="<?php echo $direccion?>" name="direccion"
                        onchange="validarDireccion()" />
                    <div class="error bg-danger">
                        <?php
                            if(isset($errores["direccion"]) && count($errores["direccion"]) > 0){
                                foreach($errores["direccion"] as $error){
                                    echo "<div>".$error."</div>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-6">
                    <label for="importe">Importe *</label>
                    <input id="importe" class="form-control" value="<?php echo $importe?>" name="importe"
                        onchange="validarimporte()" />
                    <div class="error bg-danger">
                        <?php
                        if(isset($errores["importe"]) && count($errores["importe"]) > 0){
                            foreach($errores["importe"] as $error){
                                echo "<div>".$error."</div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-6">
                    <label for="id_usuarios">Id_usuario *</label>
                    <input id="id_usuarios" class="form-control" value="<?php echo $id_usuarios?>" name="id_usuarios"
                        onchange="validar_id_usuario()" />
                    <div class="error bg-danger">
                        <?php
                        if(isset($errores["id_usuarios"]) && count($errores["id_usuarios"]) > 0){
                            foreach($errores["id_usuarios"] as $error){
                                echo "<div>".$error."</div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            

            <button class="btn btn-success">Enviar Formulario</button>

        </form>
    </div>

    <div class="modal fade" id="modal" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">VALIDANDO</h5>
                </div>
                <div class="modal-body">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated w-100 bg-info"
                            role="progressbar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>