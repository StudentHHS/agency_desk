<?php

namespace AgencyDesk\DBBundle\Entity\Log;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * AgencyDesk\DBBundle\Entity\Log\CallLog
 *
 * @ORM\Table(name = "log__call")
 * @ORM\Entity
 */
class CallLog {
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $type
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $type;


    /**
     * @var string $mac
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $mac;


    /**
     * @var string $incoming
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $incoming;

    /**
     * @var string $outgoing
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $outgoing;

    /**
     * @var string $account
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $account;

    /**
     * @var datetime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @var datetime $updated
     *
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    protected $updated;

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
     * Set from
     *
     * @param string $from
     *
     * @return CallLog
     */
    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Get from
     *
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set to
     *
     * @param string $to
     *
     * @return CallLog
     */
    public function setTo($to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get to
     *
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Set account
     *
     * @param string $account
     *
     * @return CallLog
     */
    public function setAccount($account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return CallLog
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return CallLog
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set incoming
     *
     * @param string $incoming
     *
     * @return CallLog
     */
    public function setIncoming($incoming)
    {
        $this->incoming = $incoming;

        return $this;
    }

    /**
     * Get incoming
     *
     * @return string
     */
    public function getIncoming()
    {
        return $this->incoming;
    }

    /**
     * Set outgoing
     *
     * @param string $outgoing
     *
     * @return CallLog
     */
    public function setOutgoing($outgoing)
    {
        $this->outgoing = $outgoing;

        return $this;
    }

    /**
     * Get outgoing
     *
     * @return string
     */
    public function getOutgoing()
    {
        return $this->outgoing;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return CallLog
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set mac
     *
     * @param string $mac
     *
     * @return CallLog
     */
    public function setMac($mac)
    {
        $this->mac = $mac;

        return $this;
    }

    /**
     * Get mac
     *
     * @return string
     */
    public function getMac()
    {
        return $this->mac;
    }
}
