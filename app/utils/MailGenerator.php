<?php

namespace app\utils;


use app\config\Constants;
use PHPMailer;

class MailGenerator
{
    private $mail;

    /**
     * MailGenerator constructor.
     */
    public function __construct()
    {
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->Host = Constants::EMAIL_SMTP;
        $this->mail->Port = Constants::EMAIL_SMTP_PORT;

        $this->mail->SMTPAuth = Constants::EMAIL_SMTP_AUTH;
        $this->mail->Username = Constants::EMAIL_USERNAME;
        $this->mail->Password = Constants::EMAIL_PASSWORD;
        $this->mail->CharSet = Constants::EMAIL_CHARSET;
        $this->mail->SMTPSecure = Constants::EMAIL_SMTP_SECURE;

        $this->mail->DKIM_domain = Constants::EMAIL_DKIM_DOMAIN;
        $this->mail->DKIM_selector = Constants::EMAIL_DKIM_SELECTOR;
        $this->mail->DKIM_passphrase = Constants::EMAIL_DKIM_PASSPHRASE;
        $this->mail->DKIM_private = Constants::EMAIL_DKIM_KEY;
    }

    /**
     * @param array $from
     * @param string $to
     * @param string $subject
     * @param string $body
     * @param bool $html
     * @return bool|string
     */
    public function sendEmail($from = array('info@nulltilus.com', 'Nulltilus'), $to, $subject, $body, $html = true)
    {
        $this->mail->clearAllRecipients();

        $this->mail->setFrom($from[0], $from[1]);
        $this->mail->addAddress($to);
        $this->mail->isHTML($html);

        $this->mail->Subject = $subject;
        $this->mail->Body = $body;

        return $this->mail->send() ? true : $this->mail->ErrorInfo;
    }
}