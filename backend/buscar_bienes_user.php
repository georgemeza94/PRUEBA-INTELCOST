<?php 
/**Consulta y devuelve en formato json un lisado de los inmuebles de usuario 
esta vez haciendo empleo de los filtros enviados por el usuario**/
$config = include 'config.php';

try {

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if($_POST['Tipo'] != '' || $_POST['Ciudad'] != '' ){

			//return json_encode($_POST['Pestaña']);

			$dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];

  			$conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
			
			$sql = 'select * FROM `inmuebles` WHERE `Ciudad` like "%'.$_POST['Ciudad'].'%" and `Tipo` like "%'.$_POST['Tipo'].'%" and EXISTS(SELECT 1 FROM `user_inmuebles` WHERE `user_inmuebles`.`Id_inmueble` = `inmuebles`.`Id`);';

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