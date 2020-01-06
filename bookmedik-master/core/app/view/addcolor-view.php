<?php
/**
* BookMedik
* @author evilnapsis
**/

if(count($_POST)>0){
	$user = new ColorData();
	$user->color = $_POST["color"];
	$user->add();

print "<script>window.location='index.php?view=color';</script>";


}


?>