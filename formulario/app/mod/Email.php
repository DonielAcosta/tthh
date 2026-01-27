<?php
require_once ('../../../config/config.php');
require_once (LIB . 'email/PHPMailerAutoload.php');
require_once (LIB . 'email/class.phpmailer.php');
class Email extends Query {
    function __construct() {
        $this->mail = new PHPMailer ();
    }
    function enviarEmail($remitente, $correoRemitente, $destinatario, $correoDestinatario, $asunto, $descAsunto, $contenido, $adjunto,$tipoAdjunto='pdf') {
        echo "[($remitente, $correoRemitente, $destinatario, $correoDestinatario, $asunto, $descAsunto, --CONTENIDO--, **adjunto**,$tipoAdjunto='pdf')]";
        if ($correoDestinatario=='' OR $correoDestinatario == null) {
            echo "El usuario no tiene correo asignado";
            die();
        }
        //         die();
        /*
         $dominio    = "ejemplo.com"; // sin http://www
         $name       = "Administrador"; // Tambi�n puede ser un campo del formulario como asunto o mensaje.
         $user       = "info";
         $password   = "eJemplo2012.";
         $SPLangDir  = "phpmailer/language/";
         $asunto    = $_POST['asunto']; // Tambi�n puede ser $_GET
         $contenido    = $_POST['mensaje'];// Tambi�n puede ser $_GET
         */
        $correoDestinatarioCopia = 'josue.villarreal@gmail.com';
        
        
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        //         $from = "villasveronica@solinf.com.ve";
        //         $to = $correoDestinatario;
        //         $subject = $asunto;
        //         $message = "PHP mail works just fine";
        //         $headers = "From:" . $from;
        //         mail($to,$subject,$message, $headers);
        //         echo "The email message was sent.";
        //         die();
        
        $dominio = "solint.com.ve"; // sin http://www
        $name = "Administrador"; // Tambi�n puede ser un campo del formulario como asunto o mensaje.
        $user = "solint";
        $password = "";
        $SPLangDir = "phpmailer/language/";
        
        $correoRemitente = 'villasveronica@solinf.com.ve';
        
        //$asunto    = $_POST['asunto']; // Tambi�n puede ser $_GET
        //$contenido    = $_POST['mensaje'];// Tambi�n puede ser $_GET
        
        
        $this->mail->Host = "mail." . $dominio; // SMTP a utilizar. Por ej. mail.elserver.com � smtp.gmail.com
        //         $this->mail->Username = $user . "@" . $dominio; // Correo completo a utilizar
        //         $this->mail->Password = $password; // Contrase�a del correo
        $this->mail->Username = 'villasveronica@solinf.com.ve'; // Correo completo a utilizar
        $this->mail->Password = 'villasveronica2021'; // Contrase�a del correo
        //         $this->mail->Port = 25; // Puerto a utilizar, normalmente es el 25
        $this->mail->Port = 465; // Puerto a utilizar, normalmente es el 25
        
        
        //$mail->setFrom ( 'vgianny@hotmail.com', 'First Last' );
        $this->mail->setFrom ( $correoRemitente, $remitente );
        //$mail->addAddress ( 'josue.villarreal@gmail.com', 'John Doe' );
        $this->mail->addAddress ( $correoDestinatario, $destinatario );
        $this->mail->addBCC($correoDestinatarioCopia);
        //$mail->Subject = 'PHPMailer mail() test';
        $this->mail->Subject = $asunto;
        // Read an HTML message body from an external file, convert referenced images to embedded,
        // convert HTML into a basic plain-text alternative body
        //$mail->msgHTML ( file_get_contents ( 'contents.html' ), dirname ( __FILE__ ) );
        $this->mail->msgHTML ( $contenido );
        // Replace the plain text body with one created manually
        if ($descAsunto != '') {
            //$mail->AltBody = 'This is a plain-text message body';
            $this->mail->AltBody = $descAsunto;
        }
        // Attach an image file
        if ($adjunto != '') {
            //$mail->addAttachment ( 'images/phpmailer_mini.png' );
            if ($tipoAdjunto=='pdf') {
                $this->mail->AddStringAttachment($adjunto, 'doc.pdf', 'base64', 'application/pdf');
            }else{
                $this->mail->addAttachment ( $adjunto );
            }
        }
        // send the message, check for errors
        if (! $this->mail->send ()) {
            $res = "Mailer Error: " . $this->mail->ErrorInfo;
            //             echo "<br><br> [$res]";
            return $res;
            // 			return false;
        } else {
            $res = "Message sent!";
            //             echo "<br><br> [$res]";
            return true;
        }
        // 		return $res;
    }
}
?>