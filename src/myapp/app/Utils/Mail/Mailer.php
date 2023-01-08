<?php
namespace App\Utils\Mail;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
    private $mailer;
    
    public function __construct()
    {
        $this->mailer = new PHPMailer();
        $this->_setMailer();
    }

    private function _setMailer() : void
    {
        $this->mailer->isSMTP();
        $this->mailer->Host = env_var('MAIL_HOST');
        $this->mailer->SMTPAuth = true;
        $this->mailer->Port = env_var('MAIL_PORT');
        $this->mailer->Username = env_var('MAIL_USERNAME');
        $this->mailer->Password = env_var('MAIL_PASSWORD');
    }

    public function setHeaders(string $email) : Mailer
    {
        $this->mailer->setFrom(env_var('MAIL_SENDER'), env_var('MAIL_SENDER_NAME'));
        $this->mailer->Subject = 'Test Report';
        $this->mailer->addAddress($email, 'Test');

        return $this;
    }

    public function addAttachment(string $filePath) : Mailer
    {
        $this->mailer->addAttachment($filePath, 'make_report.xlsx');

        return $this;
    }

    public function setContent(string $content = '') : Mailer
    {
        if ($content == '') {
            $mailContent = "<h1>Make Report</h1>
            <p>Sending the Excel report of the Makes.</p>";
            $this->mailer->Body = $mailContent;
        }

        return $this;
    }

    public function send(): void
    {
        if($this->mailer->send()){
            echo 'Message has been sent';
        }else{
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $this->mailer->ErrorInfo;
        }
    }
}