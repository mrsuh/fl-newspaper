<?php

namespace Mrsuh\NewspaperBundle\Model;

use Doctrine\ORM\EntityManager;
use Mrsuh\NewspaperBundle\Service\MailService;
use Mrsuh\NewspaperBundle\Service\PayService;
use Symfony\Bundle\TwigBundle\TwigEngine;

class SubscribeModel
{
    private $repo_subscriber;
    private $service_pay;
    private $service_mail;
    private $template;
    private $newspaper_file_path;
    private $mailer_user;

    public function __construct(EntityManager $em, PayService $service_pay, MailService $service_mail, TwigEngine $template, $newspaper_file_path, $mailer_user)
    {
        $this->repo_subscriber = $em->getRepository('MrsuhNewspaperBundle:Subscriber');
        $this->service_pay = $service_pay;
        $this->service_mail = $service_mail;
        $this->template = $template;
        $this->newspaper_file_path = $newspaper_file_path;
        $this->mailer_user = $mailer_user;
    }

    public function subscribe($name, $email)
    {
        $payParams = $this->service_pay->pay();

        $this->repo_subscriber->create([
            'name' => $name,
            'email' => $email,
            'pay_token' => $payParams->acs_params->cps_context_id,
            'date_time' => new \DateTime(),
            'payed' => false
        ]);

        return $payParams;
    }

    public function callbackSuccess($payToken)
    {
        $subscriber = $this->repo_subscriber->findOneBy(['payToken' => $payToken]);

        if(!$subscriber){
            throw new \Exception('Subscriber with pay token ' . $payToken . ' not found');
        }

        $this->repo_subscriber->update($subscriber, ['payed' => true]);

        $mailBody = $this->template->render('MrsuhNewspaperBundle:Mail:subscriber.html.twig');

        $this->service_mail->mail($subscriber->getEmail(), 'Подписка на газету FL Story', $mailBody, $this->newspaper_file_path);

        $mailBody = $this->template->render('MrsuhNewspaperBundle:Mail:editor.html.twig',
            [
                'name' => $subscriber->getName(),
                'email' => $subscriber->getEmail()
            ]
        );

        $this->service_mail->mail($this->mailer_user, 'Новый подписчик FL Story', $mailBody);
    }
}
