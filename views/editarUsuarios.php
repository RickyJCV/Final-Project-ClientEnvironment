<!DOCTYPE html>
<html>

<head lang="es">
    <meta charset="UTF-8">
    <title>EDITAR EMAIL USUARIOS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Incluimos librería Bootstrap css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
        integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <!-- Incluimos las librerís JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"
        integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/validacionUsuarios.js" defer></script>
    <link rel="stylesheet" href="../css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                            <a class="dropdown-item" href="paginacionCachimbas.html">Paginar</a>

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
                            <a class="dropdown-item" href="mostrarPedidos.php">Mostrar/Borrar</a>
                            <a class="dropdown-item" href="paginacionPedidos.html">Paginar</a>

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
                            <a class="dropdown-item" href="mostrarUsuarios.php">Mostrar/Borrar</a>
                            <a class="dropdown-item" href="paginacionUsuarios.html">Paginar</a>

                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container-fluid">
        <form id="formulario" method="POST" action="" onsubmit="validarFormulario2(event)">

            <div class="form-row ml-3">
                <div class="form-group col-6">
                    <label for="usuario">Seleccion usuario</label>
                    <div class="input-group">
                        <?php require_once "../servidor/select_id_usuario.php" ?>
                        <select id="usuario" class="form-control" name="usuario">
                            <?php
                            foreach($id_usuarios as $usuario)
                            {
                            ?>
                            <option value="<?php echo $usuario["id"] ?>"><?php echo $usuario["nombre"]?>
                            </option>

                            <?php } ?>
                        </select>

                    </div>
                </div>
            </div>

            <div class="form-row ml-3">
                <div class="form-group col-6">
                    <label for="email">Indique el Email nuevo:</label>
                    <div class="input-group">
                        <input type="text" id="email" onchange="validaremail2()" />
 
                        <div id="loadingemailnuevo" class="spinner-border text-primary invisible" role="status" >
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
            <button class="btn btn-success">Actualizar</button>
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

</body>

</html>