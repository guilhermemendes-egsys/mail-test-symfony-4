<?php

require_once 'vendor/autoload.php';

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

class MailManager {
    
    public static function sendMail(){
        $transport = Transport::fromDsn('smtp://<add-send-mail>:<add-password-mail>@<add-smtp-server>:<add-smtp-port>');
        $mailer = new Mailer($transport);

        $html = '
            <p>Teste testando.. 123</p>
        ';
        $textPlain = '
            Teste testando.. 123
        ';

        $email = (new Email())
            ->from('<add-send-mail>')
            ->to('guilherme.mendes@egsys.com.br')
            ->priority(Email::PRIORITY_HIGHEST)
            ->subject('Teste testando.. 123')
            ->text($textPlain)
            ->html($html);
        
        $mailer->send($email);
    }

}

try {
    MailManager::sendMail();
} catch (\Exception $e) {
    var_dump('<pre>', $e);
    die;
}