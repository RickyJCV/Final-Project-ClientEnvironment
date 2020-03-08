<!DOCTYPE html>
<html>

<head lang="es">
	<meta charset="UTF-8">
	<title>MOSTRAR CACHIMBA</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Libreria de Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!--DATATABLE-->
	<link rel="stylesheet" type="text/css"
		href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css"
		href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" />
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
	<!-- FONT AWESOME -->
	<script src="https://kit.fontawesome.com/eb7b540af7.js" crossorigin="anonymous"></script>
	<script src="../js/tablas.js"></script>
	<!-- JS -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
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
	
	<br>
	<form>
		<label for="buscar">Buscar</label>
		<input id="buscar" type="search">
	</form>

	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<table id="tablaCachimbas" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Color</th>
						<th>Precio</th>
						<th>Stock</th>
						<th>Acciones</th>
					</tr>
				</thead>
			</table>
			</div>
			<div class="col-6">
				<h4>Colores</h4><br>
				<input type="radio" id="nada" name="color" value="nada">
				  <label for="nada">Sin filtro</label><br>

				<input type="radio" id="rojo" name="color" value="roja">
				  <label for="rojo">ROJO</label><br>

				  <input type="radio" id="azul" name="color" value="azul">
				  <label for="azul">AZUL</label><br>

				  <input type="radio" id="naranja" name="color" value="naranja">
				  <label for="naranja">NARANJA</label><br>

				  <input type="radio" id="negro" name="color" value="negra">
  				<label for="negro">NEGRO</label><br>
				<!--
				<input type="checkbox" id="rojo" value="roja"><b>ROJO</b><br>
				<input type="checkbox" id="azul" value="azul"><b>AZUL</b><br>
				<input type="checkbox" id="naranja" value="naranja"><b>NARANJA</b><br>
				<input type="checkbox" id="negro" value="negra"><b>NEGRO</b>
-->
			</div>
		</div>
	</div>







	<div id="modalEliminar" class="modal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Eliminar Cachimba</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>¿Estás seguro de eliminar esta cachimba?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button id="botonConfirmarEliminar" type="button" class="btn btn-primary"
						data-accion="confirmar-eliminar" data-ideliminar="">Confirmar</button>
				</div>
			</div>
		</div>
	</div>




</body>

</html>