<?php
ini_set ('display_errors', true); 

/*$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$comentario = $_POST['comentario'];

//$header = "From: niko.afv@live.com";
$header = "Content-Type: text/plain";
echo $cuerpo = "$nombre $apellido  $email $comentario";
mail("niko.afv@gmail.com","Larvaterapia",$cuerpo, $header);

echo "pasa";*/



















date_default_timezone_set('America/Santiago'); //Se define la zona horaria
require_once('class/class.phpmailer.php'); //Incluimos la clase phpmailer
 
$mail = new PHPMailer(true); // Declaramos un nuevo correo, el parametro true significa que mostrara excepciones y errores.
 
$mail->IsSMTP(); // Se especifica a la clase que se utilizará SMTP
 
try {
//------------------------------------------------------
  $correo_emisor="niko.afv@gmail.com";     //Correo a utilizar para autenticarse
                         //Gmail o de GoogleApps
  $nombre_emisor="Nicolás Fredes";               //Nombre de quien envía el correo
  $contrasena="RitmoyrimA";          //contraseña de tu cuenta en Gmail
  $correo_destino="nicolas.fredes@fusiona.cl";      //Correo de quien recibe
  $nombre_destino="NFREDES";                //Nombre de quien recibe
//--------------------------------------------------------
  $mail->SMTPDebug  = 2;                     // Habilita información SMTP (opcional para pruebas)
                                             // 1 = errores y mensajes
                                             // 2 = solo mensajes
  $mail->SMTPAuth   = true;                  // Habilita la autenticación SMTP
  $mail->SMTPSecure = "ssl";                 // Establece el tipo de seguridad SMTP
  $mail->Host       = "smtp.gmail.com";      // Establece Gmail como el servidor SMTP
  $mail->Port       = 465;                   // Establece el puerto del servidor SMTP de Gmail
  $mail->Username   = $correo_emisor;         // Usuario Gmail
  $mail->Password   = $contrasena;           // Contraseña Gmail
  //A que dirección se puede responder el correo
  $mail->AddReplyTo($correo_emisor, $nombre_emisor);
  //La direccion a donde mandamos el correo
  $mail->AddAddress($correo_destino, $nombre_destino);
  //De parte de quien es el correo
  $mail->SetFrom($correo_emisor, $nombre_emisor);
  //Asunto del correo
  $mail->Subject = 'Prueba de phpMailer en Garabatos Linux';
  //Mensaje alternativo en caso que el destinatario no pueda abrir correos HTML
  $mail->AltBody = 'Hijole para ver el mensaje necesita un cliente de correo compatible con HTML.';
  //El cuerpo del mensaje, puede ser con etiquetas HTML
  $mail->MsgHTML("<strong>¿Que otro nombre recibe el área de sol del Estadio Cuscatlán?</strong>");
  //Archivos adjuntos
  //$mail->AddAttachment('img/logo.jpg');      // Archivos Adjuntos
  //Enviamos el correo
  $mail->Send();
  echo "Mensaje enviado. Que chivo va vos!!";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Errores de PhpMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Errores de cualquier otra cosa.
}
?>