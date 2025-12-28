<?php

namespace App\Libraries;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailService
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        
        // Server settings
        $this->mail->isSMTP();
        $this->mail->Host       = 'smtp.gmail.com';
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = 'ahmed100pro@gmail.com';
        $this->mail->Password   = 'tdlh gbqc iuwh ljcw';
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port       = 587;
        $this->mail->CharSet    = 'UTF-8';

        // Default From
        $this->mail->setFrom('ahmed100pro@gmail.com', 'Ethar Platform');
    }

    public function send($to, $subject, $body)
    {
        try {
            $this->mail->addAddress($to);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;
            $this->mail->isHTML(true); // Send as HTML

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            log_message('error', 'Mail Error: ' . $this->mail->ErrorInfo);
            return false;
        }
    }
}
