<?php

namespace gustin\electraphp;

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\SMTP;


class Mail
{
    /** 
     * @var string $host
     * @var string $username
     * @var string $password
     * @var int $port
    **/
    public $host;
    public $username;
    public $password;
    public $port;

    public function __construct($host = null, $username = null, $password = null, $port = null)
    {
        if (is_string($host) || is_string($username) || is_string($password) || !empty($host) && !empty($username) && !empty($password) && !empty($port)) {
            $this->host = $host;
            $this->username = $username;
            $this->password =  $password;
            $this->port = $port;
        } else {
            throw new \Error();
        }
    }
    /** 
     * @param string $fromMail
     * @param string $toAddress
     * @param string $subject
     * @param string $body
     * @param string $altbody
     * @return boolean
    **/
    public function sendMail($fromMail, $toAddress, $subject, $body, $altbody)
    {
        // if(empty($fromMail) || empty($toAddress) || empty($subject) || empty($body) || empty($altbody)){
        //     echo "Campos vazios.";
        //     return false;
        //     exit();
        // }
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $this->host;                            //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $this->username;                        //SMTP username
            $mail->Password   = $this->password;                        //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = $this->port;                            //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($fromMail);
            $mail->addAddress($toAddress);                              //Add a recipient

            //Content
            $mail->isHTML(true);                                        //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = $altbody;

            $mail->send();
            echo 'Mensagem Enviada';
            return true;
        } catch (\Exception $e) {
            echo "A Mensagem Não Pode Ser Enviada. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
}
