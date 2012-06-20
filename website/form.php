<?php
//ini_set ('display_errors', true); 

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$comentario = $_POST['comentario'];

//$header = "From: niko.afv@live.com";
//$header = "Content-Type: text/plain";
//$cuerpo = "$nombre $apellido  $email $comentario";
//mail("niko.afv@gmail.com","Larvaterapia",$cuerpo, $header);

//echo "pasa";*/

$html = "
 <h3>Contacto - Larvaterapia</h3>
 <br    /><strong>Nombre:</strong> " . $nombre . " " . $apellido .
"<br    /><strong>E-mail:</strong> " . $email .
"<br    /><strong>Comentario:</strong>  " . $comentario .
"";

date_default_timezone_set('America/Santiago'); //Se define la zona horaria
require_once('class/class.phpmailer.php'); //Incluimos la clase phpmailer
 
$mail = new PHPMailer(true); // Declaramos un nuevo correo, el parametro true significa que mostrara excepciones y errores.
 
$mail->IsSMTP(); // Se especifica a la clase que se utilizará SMTP
 
try {
//------------------------------------------------------
  $correo_emisor="larvaterapiachile@gmail.com";     //Correo a utilizar para autenticarse
                         //Gmail o de GoogleApps
  $nombre_emisor="Nicolas Fredes";               //Nombre de quien envía el correo
  $contrasena="isikechile2012";          //contraseña de tu cuenta en Gmail
  //$correo_destino="francisco.calleja@hotmail.es";      //Correo de quien recibe
  $correo_destino="fcalleja87@gmail.com ";      //Correo de quien recibe
  $nombre_destino="Francisco Calleja";                //Nombre de quien recibe
  $correo_destino2="augartepena@gmail.com";      //Correo de quien recibe
  $nombre_destino2="A. Ugarte Peña";                //Nombre de quien recibe
  $correo_destino3="callejahnos@gmail.com";      //Correo de quien recibe
  $nombre_destino3="Calleja Hmnos";                //Nombre de quien recibe
//--------------------------------------------------------
  //$mail->SMTPDebug  = 2;                     // Habilita información SMTP (opcional para pruebas)
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
  $mail->AddAddress($correo_destino2, $nombre_destino2);
  $mail->AddAddress($correo_destino3, $nombre_destino3);
  //De parte de quien es el correo
  $mail->SetFrom($correo_emisor, $nombre_emisor);
  //Asunto del correo
  $mail->Subject = 'Contacto - Larvaterapia';
  //Mensaje alternativo en caso que el destinatario no pueda abrir correos HTML
  //$mail->AltBody = 'Hijole para ver el mensaje necesita un cliente de correo compatible con HTML.';
  //El cuerpo del mensaje, puede ser con etiquetas HTML
  $mail->MsgHTML($html);
  //Archivos adjuntos
  //$mail->AddAttachment('img/logo.jpg');      // Archivos Adjuntos
  //Enviamos el correo
    $mail->Send();
    
    echo true;
      
//  echo "Mensaje enviado. Que chivo va vos!!";
} catch (phpmailerException $e) {
    return $e->errorMessage(); //Errores de PhpMailer
}
?>