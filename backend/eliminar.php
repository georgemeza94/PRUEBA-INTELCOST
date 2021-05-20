<?php 
/**Elimina del listado de bienes del usuario el bien seleccionado**/
$config = include 'config.php';

try {

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['Id'])){

			$dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];

  			$conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

  			$sql = "DELETE FROM `user_inmuebles` WHERE `Id_inmueble` = ".$_POST['Id'].";";

  			$conexion->exec($sql);

  			echo "INMUEBLE ELIMINADO";
		}
	}
	
} catch (PDOException $error) {
  	echo $error->getMessage();
}

?>