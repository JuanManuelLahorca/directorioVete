<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require_once './libs/composer/vendor/phpmailer/phpmailer/src/Exception.php';
    require_once './libs/composer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require_once './libs/composer/vendor/phpmailer/phpmailer/src/SMTP.php';

    class mail{


    function enviarEmail($maildireccion){
        $mail = new PHPMailer(true);
            //$maildireccion;
            //ini_set("SMTP","localhost");
            //ini_set("smtp_port","25");
            //mail($maildireccion, $asunto, $cuerpo);
        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'juanmanuellahorca@gmail.com';                     //SMTP username
            $mail->Password   = '';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = ;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('juanmanuellahorca@gmail.com', 'Directorio Veterinario');
            $mail->addAddress($maildireccion, $maildireccion);     //Add a recipient  solschmidt.vt@gmail.com
            //$mail->addAddress('ellen@example.com');               //Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = '"Directorio Veterinario"';
            $mail->Body    = '
            <html> 
            <head> 
                <title>Prueba de correo</title> 
            </head> 
            <body> 
            <h1>Hola amigos!</h1> 
            <p> 
            <b>Ya eres miembro activo del Directorio Veterinario</b>. Te damos la bienvenida a Directorio Veterinario. 
            </p> 
            </body> 
            </html> ';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            //echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    function enviarNewPassEmail($maildireccion, $newPassword){
        $mail = new PHPMailer(true);
            //$maildireccion;
            //ini_set("SMTP","localhost");
            //ini_set("smtp_port","25");
            //mail($maildireccion, $asunto, $cuerpo);
        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'juanmanuellahorca@gmail.com';                     //SMTP username
            $mail->Password   = '';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = ;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('juanmanuellahorca@gmail.com', 'Directorio Veterinario');
            $mail->addAddress($maildireccion, $maildireccion);     //Add a recipient  solschmidt.vt@gmail.com
            //$mail->addAddress('ellen@example.com');               //Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Directorio Veterinario';
            $mail->Body    = '
            <html> 
            <head> 
                <title>Prueba de correo</title> 
            </head> 
            <body> 
            <h1>Hola amigos!</h1> 
            <p> 
                Nueva contraseña aleatoria :' .$newPassword. '. 
            </p> 
            </body> 
            </html> ';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            //echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
