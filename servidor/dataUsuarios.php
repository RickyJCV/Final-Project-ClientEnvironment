<?php
require_once "conexion.php";
sleep(1);
	if (isset($_POST['getData'])) {
		$conn = new mysqli($servidor, $usuario, $password, $baseDatos);

		$start = $conn->real_escape_string($_POST['start']);
		$limit = $conn->real_escape_string($_POST['limit']);

		$sql = $conn->query("SELECT nombre,apellidos,email FROM usuarios LIMIT $start, $limit");
		if ($sql->num_rows > 0) {
			$response = "";

			while($data = $sql->fetch_array()) {
				$response .= '
					<div>
						<h2>'.$data['nombre'].'</h2>
						<p>'.$data['apellidos'].'</p>
						<p>'.$data['email'].'</p>
					</div>
				';
			}

			exit($response);
		} else
			exit('reachedMax');
	}
?>