<?php

namespace Mrsuh\NewspaperBundle\Model;

use Doctrine\ORM\EntityManager;
use Mrsuh\NewspaperBundle\Service\MailService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SupportModel
{
    private $service_mail;
    private $template;
    private $mail_support;

    public function __construct(EntityManager $em, MailService $service_mail, Template $template, $mail_support)
    {
        $this->support_subscriber = $em->getRepository('MrsuhNewspaperBundle:Support');
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

        $this->service_mail->send($this->mail_support, 'Техподдержка FLStory', $mailBody);
    }
}
