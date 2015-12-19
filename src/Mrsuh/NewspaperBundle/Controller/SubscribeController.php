<?php

namespace Mrsuh\NewspaperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SubscribeController extends Controller
{
    public function callbackSuccessAction(Request $request)
    {
        $data = $request->query;
        $this->get('model.subscribe')->callbackSuccess($data->get('cps_context_id'));

        return $this->redirectToRoute('index', ['subscribe' => true]);
    }

    public function callbackFailAction()
    {
        return $this->redirectToRoute('index', ['subscribe' => false]);
    }
}
