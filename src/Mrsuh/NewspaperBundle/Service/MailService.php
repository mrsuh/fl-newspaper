<?php

namespace Mrsuh\NewspaperBundle\Service;

class MailService
{
    private $mailer;
    private $mailer_user;

    public function __construct($mailer, $mailer_user)
    {
        $this->mailer = $mailer;
        $this->mailer_user = $mailer_user;
    }

    public function mail($to, $subject, $body, array $attach = [])
    {
        $mailer = $this->mailer;
        $message = $mailer->createMessage()
            ->setSubject($subject)
            ->setTo($to)
            ->setFrom($this->mailer_user)
            ->setBody($body, 'text/html');

        if(!empty($attach)){
            foreach($attach as $a){
                $message->attach(\Swift_Attachment::fromPath($a));
            }
        }

        $mailer->send($message);
    }
}