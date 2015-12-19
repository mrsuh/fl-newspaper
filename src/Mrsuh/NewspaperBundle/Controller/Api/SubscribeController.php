<?php

namespace Mrsuh\NewspaperBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class SubscribeController extends Controller
{
    public function subscribeAction(Request $request)
    {
        try{
            $data = $request->request;//validate
            $email = $data->get('email');
            $name = $data->get('name');

            switch(true){
                case !filter_var($email, FILTER_VALIDATE_EMAIL):
                    $params = ['status' => 'error', 'data' => 'Введен неверный почтовый адрес'];
                    break;
                case empty($name):
                    $params = ['status' => 'error', 'data' => 'Не введено поле ФИО'];
                    break;
                default:
                    $params = [
                        'status' => 'ok',
                        'data' => $this->get('model.subscribe')->subscribe($data->get('name'), $data->get('email'))
                    ];
            }

        } catch(\Exception $e){
            $params = ['status' => 'error', 'data' => $e->getMessage()];
        }

        return new JsonResponse($params);
    }
}
