<?php
require 'C:\wamp64\www\repaso\vendor\autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Captura los valores enviados desde el formulario
    $destinatarioEmail = $_POST['email']; 
    $asunto = $_POST['asunto'];
    $mensajeHtml = nl2br($_POST['mensaje']); 

    $mail = new PHPMailer(true);

    try {
        //Configuración del servidor
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'tu_correo@gmail.com'; //SMTP usuario
        $mail->Password   = 'tu_contraseña'; //SMTP contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        //Destinatarios
        $mail->setFrom('tu_correo@gmail.com', 'Cristina');
        $mail->addAddress($destinatarioEmail); //Añadir un destinatario

        //Contenido
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body    = $mensajeHtml;
        $mail->AltBody = strip_tags($mensajeHtml); //Para clientes de correo no HTML

        $mail->send();
        echo 'El mensaje ha sido enviado';
    } catch (Exception $e) {
        echo "El mensaje no pudo ser enviado. Error de PHPMailer: {$mail->ErrorInfo}";
    }
}
