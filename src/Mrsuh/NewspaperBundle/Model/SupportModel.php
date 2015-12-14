<?php

namespace Mrsuh\NewspaperBundle\Model;

use Mrsuh\NewspaperBundle\Service\MailService;
use Symfony\Bundle\TwigBundle\TwigEngine;

class SupportModel
{
    private $service_mail;
    private $template;
    private $mail_support;

    public function __construct(MailService $service_mail, TwigEngine $template, $mail_support)
    {
        $this->service_mail = $service_mail;
        $this->template = $template;
        $this->mail_support = $mail_support;
    }

    public function support($email, $body)
    {
        $mailBody = $this->template->render('MrsuhNewspaperBundle:Mail:support.html.twig',
            [
                'email' => $email,
                'body' => $body,
            ]
        );

        $this->service_mail->mail($this->mail_support, 'Техподдержка FLStory', $mailBody);
    }
}
