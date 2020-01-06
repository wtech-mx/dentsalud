<?php
    session_start();
    
    // Genero el codigo y lo guardo en la sesión para consultarlo luego.
    $captchaCode = substr(sha1(microtime() * mktime()), 0, 9);
    $_SESSION['CAPTCHA_CODE'] = sha1($captchaCode);
    
	$width = 100;
	$height = 35;

	$my_image = imagecreatetruecolor($width, $height);

	imagefill($my_image, 0, 0, 0xF2F2F2);

	// add noise
	for ($c = 0; $c < 200; $c++){
	$x = rand(0,$width-1);
	$y = rand(0,$height-1);
	imagesetpixel($my_image, $x, $y, 0x000000);
	}

	$x = rand(1,10);
	$y = rand(1,10);


	imagestring($my_image, 5, $x, $y, $captchaCode, 0x000000);

	setcookie('tntcon',(md5($captchaCode).'a4xn'));

    
    // Image output.
	header("Expires: Wed, 1 Jan 1997 00:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
    header("Content-type: image/png");
    imagepng($my_image);
?> 