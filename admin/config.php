<?php

define('RUTA', 'http://dentsalud/');
//define('RUTA', 'https://eago.com.mx/blog/');

//DB TRABJANDO EN LOCALHOST
$bd_config = array(
	'basedatos' => 'dentsalud-db',
	'usuario' => 'root',
	'pass' => ''
);
//DB TRABJANDO EN EL SERVIDOR
//
//$bd_config = array(
	//'basedatos' => 'blog-eago',
	//'usuario' => 'user-blog',
	//'pass' => 'Blog123.'
//);

$blog_config = array(
	'post_por_pagina'=> '3',
	'carpeta_imagenes' => 'imagenes/'
);


?>
