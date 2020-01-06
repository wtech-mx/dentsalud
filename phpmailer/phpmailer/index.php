<?php
require("class.phpmailer.php");
session_start();
    $msg = "";
    if ($_POST['action'] == "send") {
        $Message = "";
		$Captcha = (string) $_POST["CAPTCHA_CODE"];
		if(sha1($Captcha) != $_SESSION["CAPTCHA_CODE"]) {
            $Message = "<p class='error'>El clave de seguridad no ha sido ingresado o es incorrecto.</p>";
        }else {
			
		$varname = $_FILES['Adjunto']['name'];
    	$vartemp = $_FILES['Adjunto']['tmp_name'];
		
		$mail = new PHPMailer();
		$mail->Host = "localhost";
		$mail->From = $_POST['re_eMail'];
		$mail->FromName = $_POST['Nombre'];
		$mail->Subject = $_POST['Asunto'];
		$mail->AddAddress($_POST['Recipiente']);
		$mail->AddCC($_POST['CopiaA']);
		if ($varname != "") {
			$mail->AddAttachment($vartemp, $varname);
		}
		$link = "http://".$_SERVER['SERVER_NAME'];
		$body = "<font face=Arial, Helvetica, sans-serif size=2 color=#333333><strong>Datos de Informaci&oacute;n en Contacto:</strong></font><br><br><hr width=450px align=left><br><font face=Arial, Helvetica, sans-serif size=2><strong>Nombre:</strong> ".$_POST['Nombre']."<br><strong>Direcci&oacute;n:</strong> ".$_POST['Direccion']."<br><strong>Tel&eacute;fono:</strong> ".$_POST['Telefono']."<br><strong>Correo Electr&oacute;nico:</strong> ".$_POST['re_eMail']."<br><strong>Comentarios:</strong> ".$_POST['Comentarios']."</font><p></p>";
	$body.= "<p><font face=Arial, Helvetica, sans-serif size=2>Mi Empresa<br><strong>slogan de la empresa</strong></font><br><i><a href='$link/' style='font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#333333; text-decoration:none;'>$link/</a></i></p>";
		
	$mail->Body = $body;
	$mail->IsHTML(true);
	$mail->Send();
	
    header("Location: $link/gracias.php");
    exit;
	}

}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Configuración de Formulario con PHPmailer</title>
<script language="javascript1.2">

var filtro  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

function validar(){

var datos = document.contactenos;
var archivo = datos.Adjunto.value;
var extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();

if(datos.Nombre.value=="")
{
 alert('Se requiere que llene el siguiente campo(s) para poder completar su envio:');
 datos.Nombre.focus();
 datos.Nombre.value="";
 return false;
}

if(datos.Direccion.value=="")
{
 alert('Se requiere que llene el siguiente campo(s) para poder completar su envio:');
 datos.Direccion.focus();
 datos.Direccion.value="";
 return false;
}

if(datos.Telefono.value=="")
{
 alert('Se requiere que llene el siguiente campo(s) para poder completar su envio:');
 datos.Telefono.focus();
 datos.Telefono.value="";
 return false;
}

if(datos.re_eMail.value=="")
{
 alert('Se requiere que llene el siguiente campo con una direccion de email valida para poder completar su envio:');
 datos.re_eMail.focus();
 datos.re_eMail.value="";
 return false;
}

if (!filtro.test(datos.re_eMail.value)){

        alert("Su direccion de email es incorrecta");

        return false;

    }

if(datos.Comentarios.value=="")
{
 alert('Se requiere que llene el siguiente campo(s) para poder completar su envio:');
 datos.Comentarios.focus();
 datos.Comentarios.value="";
 return false;
}

if(datos.Adjunto.value=="")
{
 alert('Se requiere de un archivo valido para poder completar su envio:');
 datos.Adjunto.focus();
 datos.Adjunto.value="";
 return false;
}

if (extension==".doc")
{
 datos.Adjunto.focus()
 return true;
}
else
{
alert('Comprueba la extensión de los archivos a subir. \nSólo se pueden subir archivos con extensiones: .doc')
datos.Adjunto.value="";
return false;
}

return true;

}

</script>
<link href="../PHP Mailer/css.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="500"><fieldset>
                  <legend>Datos de usuario:</legend>
                  <form action="index.php" method="post" enctype="multipart/form-data" name="contactanos">
                  <input type="hidden" name="Recipiente" value="usuario@usuario.com" />
                  <input type="hidden" name="Asunto" value="Ponga aqui el asunto que desea que le llego al correo por default" />
                    <table width="476" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="130" align="right" class="textform">Nombre:</td>
                        <td width="346"><input name="Nombre" type="text" class="textfield" id="Nombre" /></td>
                      </tr>
                      <tr>
                        <td height="10" colspan="2"></td>
                      </tr>
                      <tr>
                        <td align="right" class="textform">Dirección:</td>
                        <td><input name="Direccion" type="text" class="textfield_medium" id="Direccion" /></td>
                      </tr>
                      <tr>
                        <td height="10" colspan="2"></td>
                      </tr>
                      <tr>
                        <td align="right" class="textform">Tel&eacute;fono:</td>
                        <td><input name="Telefono" type="text" class="textfield_small" id="Telefono" /></td>
                      </tr>
                      <tr>
                        <td height="10" colspan="2"></td>
                      </tr>
                      <tr>
                        <td align="right" class="textform">E-mail:</td>
                        <td><input name="re_eMail" type="text" class="textfield_medium" id="re_eMail" /></td>
                      </tr>
                      <tr>
                        <td height="10" colspan="2"></td>
                      </tr>
                      <tr>
                        <td align="right" class="textform">Comentarios:</td>
                        <td><textarea name="Comentarios" class="textarea" id="Comentarios"></textarea></td>
                      </tr>
                      <tr>
                        <td height="10" colspan="2"></td>
                      </tr>
                      <tr>
                        <td align="right" valign="top" class="textform">Mandanos tu Curriculum:</td>
                        <td><input name="Adjunto" type="file" class="textfield_file" id="Adjunto" /></td>
                      </tr>
                      <tr>
                        <td height="10" colspan="2"></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td class="general">Escriba la clave de seguridad en el siguiente campo:</td>
                      </tr>
                      <tr>
                        <td height="10" colspan="2"></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><table width="280" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="125"><input name="CAPTCHA_CODE" type="text" class="textfield_small" /></td>
                            <td width="155"><img src="captcha.php" class="border" /></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="10" colspan="2"></td>
                      </tr>
                      <tr>
                        <td colspan="2"><?php
	
						if(!empty($Message)) {
						echo $Message; 
						}
						 
						 ?></td>
                      </tr>
                      <tr>
                        <td height="10" colspan="2"></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><input name="btsend" type="submit" class="button" onClick="return validar();" value="Enviar" />
                          &nbsp;
                          <input type="reset" name="Borrar" class="button" value="Borrar" />
                          <input type="hidden" name="action" value="send" /></td>
                      </tr>
                    </table></form></fieldset></td>
              </tr>
            </table>
</body>
</html>