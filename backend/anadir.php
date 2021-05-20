<?php 
/**Permite agregar los inmuebles seleccionados por el usuario a su lista de bienes**/
$config = include 'config.php';

try {

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['Id'])){

			$dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];

  			$conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

  			//$sql = "INSERT INTO `user_inmuebles` values (".$_POST['Id'].")";
  			$sql = "INSERT INTO `user_inmuebles` (id_inmueble) values (".$_POST['Id'].");";

  			$conexion->exec($sql);

  			echo "INMUEBLE AÑADIDO";
		}
	}
	
} catch (PDOException $error) {
  	echo $error->getMessage();
}

?>