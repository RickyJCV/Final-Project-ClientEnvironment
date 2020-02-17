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
        <a class="navbar-brand" href="../index.html">TIENDA CACHIMBAS</a>
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
    <div class="container">
        <div class="row col-12">
            <div class="md-form mt-0">
                <input class="form-control" type="text" placeholder="Buscar..." aria-label="Search">
            </div>
        </div>
    </div>




    <!-- FORMULARIO VALIDACION XHR -->


    <?php
$mostrarFormulario = true;
$errores = array();
$nombre = "";
$apellidos = "";
$password = "";
$email = "";

if(count($_POST) > 0){
    $nombre = isset($_POST["nombre"])?$_POST["nombre"]:"";
    $apellidos = isset($_POST["apellidos"])?$_POST["apellidos"]:"";
    $password = isset($_POST["password"])?$_POST["password"]:"";
    $email = isset($_POST["email"])?$_POST["email"]:"";
    require_once "../servidor/funcionesValidacionUsuarios.php";
    $errores["nombre"] = validarnombre($nombre);
    $errores["apellidos"] = validarapellidos($apellidos);
    $errores["password"] = validarpassword($password);
    $errores["email"] = validaremail($email);


    if(count($errores["nombre"]) === 0 && count($errores["apellidos"]) === 0 && count($errores["password"]) === 0 && count($errores["email"]) === 0 ){
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
                    <label for="nombre">Nombre *</label>
                    <div class="input-group">
                        <input id="nombre" class="form-control" value="<?php echo $nombre?>" name="nombre"
                            onchange="validarnombre()" />
                        <div id="loading" class="spinner-border text-primary invisible" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div class="error bg-danger">
                        <?php
                            if(isset($errores["nombre"]) && count($errores["nombre"]) > 0){
                                foreach($errores["nombre"] as $error){
                                    echo "<div>".$error."</div>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="apellidos">Apellidos *</label>
                    <div class="input-group">
                        <input id="apellidos" class="form-control" value="<?php echo $apellidos?>" name="apellidos"
                            onchange="validarapellidos()" />
                        <div id="loading2" class="spinner-border text-primary invisible" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div class="error bg-danger">
                        <?php
                        if(isset($errores["apellidos"]) && count($errores["apellidos"]) > 0){
                            foreach($errores["apellidos"] as $error){
                                echo "<div>".$error."</div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-6">
                    <label for="email">Email *</label>
                    <div class="input-group">
                        <input id="email" class="form-control" value="<?php echo $email?>" name="email"
                            onchange="validaremail()" />
                        <div id="loading3" class="spinner-border text-primary invisible" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div class="error bg-danger">
                        <?php
                        if(isset($errores["email"]) && count($errores["email"]) > 0){
                            foreach($errores["email"] as $error){
                                echo "<div>".$error."</div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="password">Password *</label><br>
                    (La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y
                    al menos una mayúscula.
                    NO puede tener otros símbolos.)
                    <div class="input-group">
                        <input id="password" class="form-control" value="<?php echo $password?>" name="password"
                            onchange="validarpassword()" />
                        <div id="loading4" class="spinner-border text-primary invisible" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div class="error bg-danger">
                        <?php
                        if(isset($errores["password"]) && count($errores["password"]) > 0){
                            foreach($errores["password"] as $error){
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
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>