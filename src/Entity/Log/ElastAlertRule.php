<?php

namespace App\Entity\Log;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * App\Entity\Log\ElastAlert
 *
 * @ORM\Table(name = "log__elastalert_rule")
 * @ORM\Entity
 */
class ElastAlertRule
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $rule
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $rule;

    /**
     * @var boolean $rule
     *
     * @ORM\Column(type="integer", length=255)
     */
    protected $hipchat;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set rule
     *
     * @param string $rule
     *
     * @return ElastAlertRule
     */
    public function setRule($rule)
    {
        $this->rule = $rule;

        return $this;
    }

    /**
     * Get rule
     *
     * @return string
     */
    public function getRule()
    {
        return $this->rule;
    }

    /**
     * Set hipchat
     *
     * @param integer $hipchat
     *
     * @return ElastAlertRule
     */
    public function setHipchat($hipchat)
    {
        $this->hipchat = $hipchat;

        return $this;
    }

    /**
     * Get hipchat
     *
     * @return integer
     */
    public function getHipchat()
    {
        return $this->hipchat;
    }
}
