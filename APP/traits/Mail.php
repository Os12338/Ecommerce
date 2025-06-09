<?php

namespace APP\traits;

// require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


trait Mail
{

    public function send_email($email, $name, $subject, $message)
    {
        $mail = new PHPMailer(true);
        try {
            // SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'os123756@gmail.com';        //
            $mail->Password   = 'ibbsyiynpbqdbddr';           // 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   // 
            $mail->Port       = 465;
        
            // sender and reciever
            $mail->setFrom('os123756@gmail.com', 'omar');
            $mail->addAddress($email, $name);
            // message
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->AltBody = 'not compatable with the lastest version';
            // send email
            $mail->send();
        } catch (Exception $e) {
            echo "Error: {$mail->ErrorInfo}";
        }
    }
}