<?php

if(count($_POST)>0){
	$user = ColorData::getById($_POST["user_id"]);
	$user->color = $_POST["color"];
	$user->update();
print "<script>window.location='index.php?view=color';</script>";


}


?>