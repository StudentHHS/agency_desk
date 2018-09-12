<?php
namespace App\Entity\Meta;

use App\Entity\System\ExternalSystem;
use App\Entity\User\User;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\Role;
use Symfony\Component\Security\Core\User\UserInterface;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * App\Entity\Meta\MetaUser
 *
 * @ORM\Table(name = "meta__user")
 * @ORM\Entity
 */
class MetaUser{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var User $user
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="cascade")
     */
    protected $user;

    /**
     * @var ExternalSystem $system
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\System\ExternalSystem")
     * @ORM\JoinColumn(name="system_id", referencedColumnName="id", onDelete="cascade")
     */
    protected $system;

    /**
     * @var string $externalId
     *
     * @ORM\Column(name="external_id", type="string", length=255, nullable=true)
     */
    protected $externalId;

    /**
     * @var boolean $active
     *
     * @ORM\Column(name="active", type="boolean", nullable=false )
     */
    protected $active = false;


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
     * Set externalId
     *
     * @param string $externalId
     * @return MetaUser
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * Get externalId
     *
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return MetaUser
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return MetaUser
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return datetime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return MetaUser
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return datetime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set user
     *
     * @param \App\Entity\User\User $user
     * @return MetaUser
     */
    public function setUser(\App\Entity\User\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \App\Entity\User\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set system
     *
     * @param \App\Entity\System\ExternalSystem $system
     * @return MetaUser
     */
    public function setSystem(\App\Entity\System\ExternalSystem $system = null)
    {
        $this->system = $system;

        return $this;
    }

    /**
     * Get system
     *
     * @return \App\Entity\System\ExternalSystem
     */
    public function getSystem()
    {
        return $this->system;
    }
}
