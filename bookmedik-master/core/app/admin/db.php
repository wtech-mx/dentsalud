<?php


  // Parametros a configurar para la conexion de la base de datos 
  $host = "localhost";    // sera el valor de nuestra BD 
  $basededatos = "DentSalud-DB1";    // sera el valor de nuestra BD 
  $usuariodb = "root";    // sera el valor de nuestra BD 
  $clavedb = "";    // sera el valor de nuestra BD 
  //Lista de Tablas
  $tabla_db1 = "slide";      // tabla de usuarios
  error_reporting(0); //No me muestra errores
  $conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);


function con(){
	return new mysqli("localhost","root","","DentSalud-DB1");
}

function insert_img($title, $folder, $image){
	$con = con();
	$con->query("insert into slide (title, boton, folder,src,created_at) value (\"$title\",\"$boton\",\"$folder\",\"$image\",NOW())");
	$con->query("insert into slide (boton) values (\"$boton\",NOW())");
}

function get_imgs(){
	$images = array();
	$con = con();
	$query=$con->query("select * from slide order by created_at desc");
	while($r=$query->fetch_object()){
		$images[] = $r;
	}
	return $images;
}

function get_img($id){
	$image = null;
	$con = con();
	$query=$con->query("select * from slide where id=$id");
	while($r=$query->fetch_object()){
		$image = $r;
	}
	return $image;
}

function del($id){
	$con = con();
	$con->query("delete from slide where id=$id");
}

?>