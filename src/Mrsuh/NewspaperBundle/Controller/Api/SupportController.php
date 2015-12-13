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

        $this->get('model.support')->support($data['email'], $data['body']);

        return new JsonResponse();
    }
}
