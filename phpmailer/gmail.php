﻿<?php

$msg = null;

      if (isset($_POST["phpmailer"]))
     {
        
    $nombre = htmlspecialchars($_POST["nombre"]);
    $email = htmlspecialchars($_POST["email"]);
    $asunto =htmlspecialchars( $_POST["asunto"]);
    $mensaje = $_POST["mensaje"];
    $adjunto = $_FILES["adjunto"];
        
        require "class.phpmailer.php";
    
          $mail = new PHPMailer;
		  
		  //indico a la clase que use SMTP
          $mail->IsSMTP();
		  
          //permite modo debug para ver mensajes de las cosas que van ocurriendo
          //$mail->SMTPDebug = 2;

		  //Debo de hacer autenticación SMTP
          $mail->SMTPAuth = true;
          $mail->SMTPSecure = "tls";

		  //indico el servidor de Hotmail para SMTP
          $mail->Host = "smtp.gmail.com";

		  //indico el puerto que usa gmail
          $mail->Port = 587;

		  //indico un usuario / clave de usuario de gmail
          $mail->Username = "";
          $mail->Password = "";
       
          $mail->From = "usuario@gmail.com";
        
          $mail->FromName = "Administrador";
        
          $mail->Subject = $asunto;
        
          $mail->addAddress($email, $nombre);
        
          $mail->MsgHTML($mensaje);
        
    
       if ($adjunto ["size"] > 0)
      {
           
          $mail->addAttachment($adjunto ["tmp_name"], $adjunto ["name"]);
   }
    
        
          if($mail->Send())
        {
    $msg= "Enhorabuena el mensaje ha sido enviado con exito a $email";
    }
        else
        {
    $msg = "Lo siento, ha habido un error al enviar el mensaje a $email";
    }
 }
?>
    
<!DOCTYPE HTML>
<html>
<head>
<title>Contacto</title>
<meta charset="UTF-8">
</head>
<body>
<h1>Enviar emails con PHPMailer a través de una cuenta de Gmail</h1>
<h3>Email de Contacto</h3>
<strong><?php echo $msg; ?></strong>

<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data">
    
<table border="0">
<tr>
<td>Nombre del destinatario:</td>
<td><input name="nombre" type="text" id="nombre"></td>
</tr>
<tr>
<td>Email del destinatario:</td>
<td><input name="email" type="text" id="email"></td>
</tr>
<tr>
<td>Asunto:</td>
<td><input name="asunto" type="text" id="asunto"></td>
</tr>
<tr>
<td>Archivo adjunto:</td>
<td><input type="file" name="adjunto"></td>
</tr>
<tr>
<td>Mensaje:</td>
<td><textarea name="mensaje" cols="50" rows="15" id="mensaje"></textarea></td>
</tr>
<tr>
<td></td><td><input type="submit" value="Enviar"></td>
</tr>
</table>
<input type="hidden" name="phpmailer">
</form>
</body>