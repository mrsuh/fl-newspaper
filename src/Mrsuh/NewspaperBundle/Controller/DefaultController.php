<?php

namespace Mrsuh\NewspaperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MrsuhNewspaperBundle:Default:index.html.twig');
    }
}
