<?php
/**en este documento incluimos las credenciales de nuestra db y servidor mysql**/
return [
	'db' => [
		'host' => 'localhost',
		'user' => 'root',
		'pass' => '',
		'name' => 'Intelcost_bienes',
		'options' => [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		]
	]
];