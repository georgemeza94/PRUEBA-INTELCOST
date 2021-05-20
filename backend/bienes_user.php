<?php 
/**Consulta y devuelve en formato json un lisado de los inmuebles de usuario**/
$config = include 'config.php';

try {

	$dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];

  	$conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

	//$sql = "SELECT * FROM `Intelcost_bienes`.`inmuebles`;";

	$sql = "select * FROM `inmuebles` WHERE EXISTS(SELECT 1 FROM `user_inmuebles` WHERE `user_inmuebles`.`Id_inmueble` = `inmuebles`.`Id`);";

	$sentencia = $conexion->prepare($sql);
	$sentencia->execute();

	$inmuebles = $sentencia->fetchAll();

	echo json_encode($inmuebles);
	
} catch (PDOException $error) {
  	echo $error->getMessage();
}

?>