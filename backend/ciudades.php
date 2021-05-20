<?php 
/**Consulta y devuelve las un json con las ciudades encontradas en la db**/
$config = include 'config.php';

try {

	$dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];

  	$conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

	$sql = "select DISTINCT Ciudad FROM `inmuebles`, `user_inmuebles`;";

	$sentencia = $conexion->prepare($sql);
	$sentencia->execute();

	$ciudades = $sentencia->fetchAll();

	echo json_encode($ciudades);
	
} catch (PDOException $error) {
  	echo $error->getMessage();
}

?>