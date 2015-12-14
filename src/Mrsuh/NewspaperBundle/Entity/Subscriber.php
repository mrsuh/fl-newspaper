<?php

namespace Mrsuh\NewspaperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subscriber
 *
 * @ORM\Table(name="subscriber")
 * @ORM\Entity(repositoryClass="Mrsuh\NewspaperBundle\Repository\SubscriberRepository")
 */
class Subscriber
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateTime", type="datetime")
     */
    private $dateTime;

    /**
     * @var bool
     *
     * @ORM\Column(name="payed", type="boolean")
     */
    private $payed;

    /**
     * @var string
     *
     * @ORM\Column(name="payToken", type="string", length=1024)
     */
    private $payToken;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Subscriber
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Subscriber
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set dateTime
     *
     * @param \DateTime $dateTime
     *
     * @return Subscriber
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * Get dateTime
     *
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Set payed
     *
     * @param boolean $payed
     *
     * @return Subscriber
     */
    public function setPayed($payed)
    {
        $this->payed = $payed;

        return $this;
    }

    /**
     * Get payed
     *
     * @return bool
     */
    public function getPayed()
    {
        return $this->payed;
    }

    /**
     * Set payToken
     *
     * @param string $payToken
     *
     * @return Subscriber
     */
    public function setPayToken($payToken)
    {
        $this->payToken = $payToken;

        return $this;
    }

    /**
     * Get payToken
     *
     * @return string
     */
    public function getPayToken()
    {
        return $this->payToken;
    }
}

