<?php
    $correo = $_POST['email'];

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../../../src/Phpmailer/Exception.php';
    require '../../../src/Phpmailer/PHPMailer.php';
    require '../../../src/Phpmailer/SMTP.php';

    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                                  //Enable verbose debug output
        $mail->isSMTP();                                       //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                  //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                              //Enable SMTP authentication
        $mail->Username   = 'dontcook01@gmail.com';            //SMTP username
        $mail->Password   = 'doontcook';                       //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                               //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('dontcook01@gmail.com', 'Administrador');
        $mail->addAddress($correo, 'Usuario');     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = utf8_decode('RECUPERACION DE CONTRASEÑA');
        $mail->Body    = 'Cambia tu contraseña dando click ';

        $mail->send();
        echo 'MENSAJE ENVIADO';
    } catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
    }
    
?>