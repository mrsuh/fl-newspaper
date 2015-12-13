<?php

namespace Mrsuh\NewspaperBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class SubscribeController extends Controller
{
    public function subscribeAction(Request $request)
    {
        $data = $request->request;

        $data['name'];
        $data['email'];//validate

        $params = $this->get('model.subscribe')->subscribe($data['name'], $data['email']);


        return new JsonResponse($params);
    }
}
