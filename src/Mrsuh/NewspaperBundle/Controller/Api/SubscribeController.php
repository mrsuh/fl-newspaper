<?php

namespace Mrsuh\NewspaperBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class SubscribeController extends Controller
{
    public function subscribeAction(Request $request)
    {
        $data = $request->request;//validate
        $email = $data->get('email');
        $name = $data->get('name');
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

        };

        if(empty($name)){

        }

        $params = $this->get('model.subscribe')->subscribe($data->get('name'), $data->get('email'));

        return new JsonResponse($params);
    }
}
