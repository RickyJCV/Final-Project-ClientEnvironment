<?php
require_once "conexion.php";
sleep(1);
	if (isset($_POST['getData'])) {
		$conn = new mysqli($servidor, $usuario, $password, $baseDatos);

		$start = $conn->real_escape_string($_POST['start']);
		$limit = $conn->real_escape_string($_POST['limit']);

		$sql = $conn->query("SELECT id_usuarios,direccion,importe FROM pedidos LIMIT $start, $limit");
		if ($sql->num_rows > 0) {
			$response = "";

			while($data = $sql->fetch_array()) {
				$response .= '
					<div>
						<h2>'.$data['id_usuarios'].'</h2>
						<p>'.$data['direccion'].'</p>
						<p>'.$data['importe'].'€</p>
					</div>
				';
			}

			exit($response);
		} else
			exit('reachedMax');
	}
?>