<?php  

// Llamando a los campos
ini_set ("sendmail_from","w-tech.com.mx");
$nombre = $_POST['nombre'];
$asunto = $_POST['asunto'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

// Datos para el correo
$destinatario = "dinopiza@yahoo.com.mx,w-tech.com.mx";
$asunto = "Contacto desde nuestra web";

$carta = "De: $nombre \n";
$carta .= "Correo: $correo \n";
$carta .= "Telefono: $telefono \n";
$carta .= "Mensaje: $mensaje";

// Enviando Mensaje
if(mail($to, $subject,$destinatario, $asunto, $carta))
{
    echo'<script type="text/javascript">
            alert("Enviado Correctamente");
            window.location="www.dent-salud.com.mx"
         </script>';
}
else{
    echo'<script type="text/javascript">
            alert("NO ENVIADO, intentar de nuevo");
            window.location="www.dent-salud.com.mx/#contact"
         </script>';
}
?>