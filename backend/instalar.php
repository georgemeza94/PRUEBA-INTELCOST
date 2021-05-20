<?php

/**Esta funcionalidad se encarga de ejecutar el script para la creacion de la db
y la posterior carga de cada uno de los registros del data-1.json
**/

$config = include 'config.php';

try {
	  $conexion = new PDO('mysql:host=' . $config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['options']);


	  $sql = file_get_contents("../data/migration.sql");
	  $conexion->exec($sql);
	  echo "La base de datos y la tabla de inmuebles se han creado con éxito.";


	   $jsonFile = "../data-1.json";

	   $jsonData = file_get_contents($jsonFile);

	   $jsonArray = json_decode($jsonData, true);

	   $query = '';

	   foreach ($jsonArray as $row) {
	   	
	   		$query = "INSERT INTO `inmuebles` VALUES 
	   		('".$row["Id"]."','".$row["Direccion"]."', '".$row["Ciudad"]."','".$row["Telefono"]."', '".$row["Tipo"]."'
	   		, '".$row["Precio"]."', '".$row["Codigo_Postal"]."'); ";

	   		$conexion->exec($query);	
	   	}

	   	echo "Se han cargado satisfactoriamente los datos a la DB";

} catch(PDOException $error) {
  	echo $error->getMessage();
}