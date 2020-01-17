<?php session_start();
require 'config.php';
require '../functions.php';
include "class.upload.php";

// Comprobamos si la session esta iniciada, sino, redirigimos.
comprobarSession();

// Conectamos a la base de datos
$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: ../error.php');
}


  $handle = new Upload($_FILES["image"]);
  if ($handle->uploaded) {
    $handle->Process("uploads/");
    if ($handle->processed) {
    	// usamos la funcion insert_img de la libreria db.php
    	insert_img($_POST["title"],"uploads/",$handle->file_dst_name);
    } else {
      echo 'Error: ' . $handle->error;
    }
  } else {
    echo 'Error: ' . $handle->error;
  }
  unset($handle);

  header('Location: ' . RUTA . '/admin/index.php');

  require '../views/slide-nuevo.view.php';




?>