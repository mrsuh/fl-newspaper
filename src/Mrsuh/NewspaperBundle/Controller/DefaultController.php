<?php

namespace Mrsuh\NewspaperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MrsuhNewspaperBundle:Default:index.html.twig');
    }

    public function subscribeAction()
    {
        $robokassa = $this->get('model.pay')->subscribe();
        return new JsonResponse(['location' => $robokassa->getEndpointQuery()]);
    }
}
