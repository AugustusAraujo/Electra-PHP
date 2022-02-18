Em Manutenção
<?php
/*
namespace gustin\electraphp;

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\SMTP;
use \PHPMailer\PHPMailer\Exception;

interface MailInterface
{
    public static function sendMail($fromMail,$toAddress,$subject,$body,$altbody);
}

class MailSender implements MailInterface
{
    public static function sendMail($fromMail,$toAddress,$subject = "",$body,$altbody = "")
    {
        $config = parse_ini_file("mailconf.ini", true);                 // Config ini file 

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $config["CONFIG"]["host"];              //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $config["CONFIG"]["username"];          //SMTP username
            $mail->Password   = $config["CONFIG"]["password"];          //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = $config["CONFIG"]["port"];              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($fromMail);
            $mail->addAddress($toAddress);           //Add a recipient

            //Content
            $mail->isHTML(true);                                        //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = $altbody;

            $mail->send();
            echo 'Mensagem Enviada';
        } catch (Exception $e) {
            echo "A Mensagem Não Pode Ser Enviada. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
*/