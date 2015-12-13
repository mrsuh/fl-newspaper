<?php

namespace Mrsuh\NewspaperBundle\Service;
;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use YandexMoney\ExternalPayment;

class PayService
{
    private $params;
    private $router;
    private $instance_id;
    private $request_id;

    public function __construct(array $params, Router $router)
    {
        $this->params = $params;
        $this->router = $router;
    }

    public function pay()
    {
        $this->getInstanceId();
        $external_payment = new ExternalPayment($this->instance_id);

        $this->getRequestId($external_payment);
        $params = $this->process($external_payment);

        return $params;
    }

    private function getInstanceId()
    {
        $response = ExternalPayment::getInstanceId($this->params['client_id']);
        if ($response->status === 'success') {
            $this->instance_id = $response->instance_id;
        } else {
            throw new \Exception($response->error_message);
        }
    }

    private function getRequestId(ExternalPayment $external_payment)
    {
        $payment_options = array(
            'pattern_id' => 'p2p',
            'to' => $this->params['wallet'],
            'amount' => $this->params['price'],
            'message' => 'Подписка на газету FLStory',
        );
        $response = $external_payment->request($payment_options);

        if ($response->status === 'success') {
            $this->request_id = $response->request_id;
        } else {
            throw new \Exception($response->message);
        }
    }

    private function process(ExternalPayment $external_payment)
    {
        $process_options = array(
            'request_id' => $this->request_id,
            'instance_id' => $this->instance_id,
            'ext_auth_success_uri' => $this->router->generate('subscribe_callback_success'),
            'ext_auth_fail_uri' => $this->router->generate('subscribe_callback_fail')
        );

        $count = 0;
        do {
            $result = $external_payment->process($process_options);

            if ('in_progress' === $result->status) {
                sleep(1);
                $count++;
            }
        } while ('in_progress' === $result->status && $count < 10);

        if ('ext_auth_required' !== $result->status) {
            throw new \Exception();
        }

        return $result;
    }
}
