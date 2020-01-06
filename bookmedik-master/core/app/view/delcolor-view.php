<?php

$color = ColorData::getById($_GET["id"]);

$color->del();
Core::redir("./index.php?view=color");


?>