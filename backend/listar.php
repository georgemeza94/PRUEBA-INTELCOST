<?php 
/**se encarga de devolver un listado de los bienes disponibles en formato json**/
$config = include 'config.php';

try {

	$dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];

  	$conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

	$sql = "select * FROM `inmuebles` WHERE NOT EXISTS(SELECT 1 FROM `user_inmuebles` WHERE `user_inmuebles`.`Id_inmueble` = `inmuebles`.`Id`);";

	$sentencia = $conexion->prepare($sql);
	$sentencia->execute();

	$inmuebles = $sentencia->fetchAll();

	echo json_encode($inmuebles);
	
} catch (PDOException $error) {
  	echo $error->getMessage();
}

?>