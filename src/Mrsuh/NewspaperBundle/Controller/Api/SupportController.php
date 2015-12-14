<?php

namespace Mrsuh\NewspaperBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class SupportController extends Controller
{
    public function supportAction(Request $request)
    {
        $data = $request->request;

        $email = $data->get('email');
        $body = $data->get('body');

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

        };

        if(empty($body)){

        }

        $this->get('model.support')->support($email, $body);

        return new JsonResponse();
    }
}
