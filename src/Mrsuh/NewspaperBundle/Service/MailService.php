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

    public function mail($to, $subject, $body, $attach = null)
    {
        $mailer = $this->mailer;
        $message = $mailer->createMessage()
            ->setSubject($subject)
            ->setTo($to)
            ->setFrom($this->mailer_user)
            ->setBody($body, 'text/html');

        if($attach){
            $message->attach(\Swift_Attachment::fromPath($attach));
        }

        $mailer->send($message);
    }
}