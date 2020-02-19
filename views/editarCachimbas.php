<!DOCTYPE html>
<html>

<head lang="es">
    <meta charset="UTF-8">
    <title>EDITAR PRECIO CACHIMBA</title>
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
    <script src="../js/validacionCachimbas.js" defer></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    

    <div class="container-fluid">
        <form id="formulario" method="POST" action="" onsubmit="validarFormulario2(event)">

            <div class="form-row ml-3">
                <div class="form-group col-6">
                    <label for="modelo">Seleccion modelo</label>
                    <div class="input-group">
                        <?php require_once "../servidor/select_id_cachimba.php" ?>
                        <select id="modelo" class="form-control" name="modelo">
                            <?php
                            foreach($modelo as $cachimba)
                            {
                            ?>
                            <option value="<?php echo $cachimba["modelo"] ?>"><?php echo $cachimba["modelo"]?>
                            </option>

                            <?php } ?>
                        </select>

                    </div>
                </div>
            </div>

            <div class="form-row ml-3">
                <div class="form-group col-6">
                    <label for="precio">Indique Precio nuevo</label>
                    <div class="input-group">
                        <input type="text" id="precio" onchange="validarprecio2()" />

                        
                            <div id="loadingprecio" class="spinner-border text-primary invisible" role="status">
                            <span class="sr-only">Loading...</span>
                            </div>
                        

                    </div>
                    
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