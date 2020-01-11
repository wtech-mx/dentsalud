<?php

require 'config.php';
require '../functions.php';


// 1.- Conectamos a la base de datos
$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: ../error.php');
}

$id = limpiarDatos($_GET['id']);

// Comprobamos que exista un ID
if (!$id) {
		header('Location: ../?view=blog ');
}

$statement = $conexion->prepare('DELETE FROM articulos WHERE id = :id');
$statement->execute(array('id' => $id));

		header('Location: ../?view=blog ');

?>