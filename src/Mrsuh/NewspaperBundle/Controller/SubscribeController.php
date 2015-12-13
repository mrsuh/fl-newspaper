<?php

namespace Mrsuh\NewspaperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class SubscribeController extends Controller
{
    public function callbackSuccessAction(Request $request)
    {
        $data = $request->query;
        $this->get('model.subscribe')->callbackSuccess($data['cps_context_id']);

        return new JsonResponse();
    }

    public function callbackFailAction(Request $request)
    {
        //4.b pat fail -> do nothing
        //5. show modal window
        return new JsonResponse();
    }
}
