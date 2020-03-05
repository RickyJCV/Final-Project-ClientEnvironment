<!doctype html>
<html lang="es">

<head>
    <title>Entorno Cliente</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/style.css">

    <script src="../js/validacionCachimbas.js" defer></script>
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
                    <!-- <a class="nav-link" href="views/usuarios.php">usuarios</a> -->
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cachimbas
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="cachimbas.php">Añadir</a>
                            <a class="dropdown-item" href="editarCachimbas.php">Editar</a>
                            <a class="dropdown-item" href="mostrarCachimbas.php">Mostrar/Borrar</a>

                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="#">pedidos</a> -->
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pedidos
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="pedidos.php">Añadir</a>
                            <a class="dropdown-item" href="editarPedidos.php">Editar</a>

                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="views/cachimbas.php">cachimbas</a> -->
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Usuarios
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="usuarios.php">Añadir</a>
                            <a class="dropdown-item" href="editarUsuarios.php">Editar</a>

                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    

    <!-- FORMULARIO VALIDACION XHR -->

    <?php
$mostrarFormulario = true;
$errores = array();
$marca = "";
$modelo = "";
$color = "";
$precio = "";
$stock = "";
if(count($_POST) > 0){
    $marca = isset($_POST["marca"])?$_POST["marca"]:"";
    $modelo = isset($_POST["modelo"])?$_POST["modelo"]:"";
    $color = isset($_POST["color"])?$_POST["color"]:"";
    $precio = isset($_POST["precio"])?$_POST["precio"]:"";
    $stock = isset($_POST["stock"])?$_POST["stock"]:"";
    require_once "../servidor/funcionesValidacionCachimbas.php";
    $errores["marca"] = validarmarca($marca);
    $errores["modelo"] = validarmodelo($modelo);
    $errores["color"] = validarcolor($color);
    $errores["precio"] = validarprecio($precio);
    $errores["stock"] = validarstock($stock);


    if(count($errores["marca"]) === 0 && count($errores["modelo"]) === 0 && count($errores["color"]) === 0 && count($errores["precio"]) === 0 && count($errores["stock"]) === 0){
        $mostrarFormulario = false;
        
        ?>
    <h1>DATOS DEL FORMULARIO</h1>
    Se ha creado correctamente la cachimba

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
                    <label for="marca">Marca *</label>
                    <input id="marca" class="form-control" value="<?php echo $marca?>" name="marca"
                        onchange="validarmarca()" />
                    <div class="error bg-danger">
                        <?php
                            if(isset($errores["marca"]) && count($errores["marca"]) > 0){
                                foreach($errores["marca"] as $error){
                                    echo "<div>".$error."</div>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="modelo">Modelo *</label>
                    <input id="modelo" class="form-control" value="<?php echo $modelo?>" name="modelo"
                        onchange="validarmodelo()" />
                    <div class="error bg-danger">
                        <?php
                        if(isset($errores["modelo"]) && count($errores["modelo"]) > 0){
                            foreach($errores["modelo"] as $error){
                                echo "<div>".$error."</div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="color">Color *</label>
                    <input id="color" class="form-control" value="<?php echo $color?>" name="color"
                        onchange="validarcolor()" />
                    <div class="error bg-danger">
                        <?php
                        if(isset($errores["color"]) && count($errores["color"]) > 0){
                            foreach($errores["color"] as $error){
                                echo "<div>".$error."</div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-6">
                    <label for="precio">Precio *</label>
                    <input id="precio" class="form-control" value="<?php echo $precio?>" name="precio"
                        onchange="validarprecio()" />

                    <div class="error bg-danger">
                        <?php
                        if(isset($errores["precio"]) && count($errores["precio"]) > 0){
                            foreach($errores["precio"] as $error){
                                echo "<div>".$error."</div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-6">
                    <label for="stock">Stock *</label>
                    <input id="stock" class="form-control" value="<?php echo $stock?>" name="stock"
                        onchange="validarstock()" />


                    <div class="error bg-danger">
                        <?php
                        if(isset($errores["stock"]) && count($errores["stock"]) > 0){
                            foreach($errores["stock"] as $error){
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