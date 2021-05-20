<?php 
/**busca y devuelve los bienes en formato json, aplicando los filtros seleccionados por el usuario**/
$config = include 'config.php';

try {

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if($_POST['Tipo'] != '' || $_POST['Ciudad'] != '' ){

			//return json_encode($_POST['Pestaña']);

			$dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];

  			$conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
			
			$sql = 'SELECT * FROM `inmuebles` WHERE `Ciudad` like "%'.$_POST['Ciudad'].'%" or `Tipo` like "%'.$_POST['Tipo'].'%";';

			$sentencia = $conexion->prepare($sql);
			$sentencia->execute();

			$inmuebles = $sentencia->fetchAll();

			echo json_encode($inmuebles);
		}
	}

} catch (PDOException $error) {
  	echo $error->getMessage();
}

?>