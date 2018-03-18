<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    include_once ('vendor/autoload.php');

    if($_POST) {
        $mail = new PHPMailer(true);                             // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.zoho.eu';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'mailtest@kdteam.su';                 // SMTP username
            $mail->Password = 'av1Grb37zh';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('mailtest@kdteam.su', 'Mailer');
            $mail->addAddress('a.krylov@kdteam.su', 'Joe User');     // Add a recipient
            $mail->addReplyTo('mailtest@kdteam.su', 'Information');

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Form is filled!';
            $mail->Body    = 'Email:'.$_POST['email'].'; Message:'.$_POST['message'];

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
?>