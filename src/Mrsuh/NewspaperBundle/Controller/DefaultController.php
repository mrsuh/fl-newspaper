<?php

namespace Mrsuh\NewspaperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('MrsuhNewspaperBundle:Default:index.html.twig', [
            'subscribe' => $request->query->get('subscribe')
        ]);
    }
}
