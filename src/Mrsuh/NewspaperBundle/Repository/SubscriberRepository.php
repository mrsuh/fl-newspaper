<?php

namespace Mrsuh\NewspaperBundle\Repository;

use Mrsuh\NewspaperBundle\Entity\Subscriber;
use Mrsuh\NewspaperBundle\Service\Common;

class SubscriberRepository extends \Doctrine\ORM\EntityRepository
{
    public function create($data)
    {
        $obj = new Subscriber();

        Common::setParams($obj, ['name', 'email', 'date_time', 'payed', 'pay_token'], $data);

        $this->_em->persist($obj);
        $this->_em->flush($obj);
    }

    public function update($obj, $data)
    {
        Common::setParams($obj, ['payed'], $data);

        $this->_em->persist($obj);
        $this->_em->flush($obj);
    }
}
