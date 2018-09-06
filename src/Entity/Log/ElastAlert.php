<?php

namespace AgencyDesk\DBBundle\Entity\Log;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * AgencyDesk\DBBundle\Entity\Log\ElastAlert
 *
 * @ORM\Table(name = "log__elastalert")
 * @ORM\Entity
 */
class ElastAlert
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
     * @var text $json
     *
     * @ORM\Column(type="text", length=1677215)
     */
    protected $json;

    /**
     * @var string $rule
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $rule;

    /**
     * @var integer $status
     *
     * @ORM\Column(type="integer")
     */
    protected $status;

    /**
     * @var text $hash
     *
     * @ORM\Column(type="text", length=1024)
     */
    protected $hash;

    /**
     * @var string $website
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $website;

    /**
     * @var string $source
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $source;

    /**
     * @var string $host
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $host;

    /**
     * @var integer $hits
     *
     * @ORM\Column(type="integer")
     */
    protected $hits;

    /**
     * @var text $message
     *
     * @ORM\Column(type="text", length=1677215)
     */
    protected $message;

    /**
     * @var datetime $logdate
     *
     * @ORM\Column(type="datetime")
     */
    protected $logdate;

    /**
     * @var datetime $detectdate
     *
     * @ORM\Column(type="datetime")
     */
    protected $detectdate;

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
     * Set json
     *
     * @param string $json
     *
     * @return ElastAlert
     */
    public function setJson($json)
    {
        $this->json = $json;

        return $this;
    }

    /**
     * Get json
     *
     * @return string
     */
    public function getJson()
    {
        return $this->json;
    }

    /**
     * Set rule
     *
     * @param string $rule
     *
     * @return ElastAlert
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
     * Set website
     *
     * @param string $website
     *
     * @return ElastAlert
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set source
     *
     * @param string $source
     *
     * @return ElastAlert
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set host
     *
     * @param string $host
     *
     * @return ElastAlert
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get host
     *
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set hits
     *
     * @param integer $hits
     *
     * @return ElastAlert
     */
    public function setHits($hits)
    {
        $this->hits = $hits;

        return $this;
    }

    /**
     * Get hits
     *
     * @return integer
     */
    public function getHits()
    {
        return $this->hits;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return ElastAlert
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set logdate
     *
     * @param \DateTime $logdate
     *
     * @return ElastAlert
     */
    public function setLogdate($logdate)
    {
        $this->logdate = $logdate;

        return $this;
    }

    /**
     * Get logdate
     *
     * @return \DateTime
     */
    public function getLogdate()
    {
        return $this->logdate;
    }

    /**
     * Set detectdate
     *
     * @param \DateTime $detectdate
     *
     * @return ElastAlert
     */
    public function setDetectdate($detectdate)
    {
        $this->detectdate = $detectdate;

        return $this;
    }

    /**
     * Get detectdate
     *
     * @return \DateTime
     */
    public function getDetectdate()
    {
        return $this->detectdate;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return ElastAlert
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
     * @return ElastAlert
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
     * Set hash
     *
     * @param string $hash
     *
     * @return ElastAlert
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Get hash
     *
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return ElastAlert
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }
}
