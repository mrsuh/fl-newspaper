<?php

namespace Mrsuh\NewspaperBundle\Model;

use Bobrovnikov\RobokassaBundle\Robokassa;
use Doctrine\ORM\EntityManager;

class PayModel
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

   public function subscribe()
   {
       $Robokassa = new Robokassa('mrsuh', 'admin', 'h4e6e2Q67p', $isShopActive = false);
       return $Robokassa
           ->setOutSum(10)
           ->setInvId(9876)
           ->setDesc('Payment for hosting services')
           ->addParam('IncCurrLabel', '')
           ->addCustomParam('user_id', 123)
       ;
   }
}
