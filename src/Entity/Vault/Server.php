<?php

namespace AgencyDesk\DBBundle\Entity\Vault;

use AgencyDesk\DBBundle\Entity\System\LegalForm;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Ambta\DoctrineEncryptBundle\Configuration\Encrypted;

/**
 * AgencyDesk\DBBundle\Entity\Vault\Server
 *
 * @ORM\Table(name = "vault_servers")
 * @ORM\Entity
 */
class Server
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
     * @var string $title
     * @Encrypted
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    protected $title;

    /**
     * @var Customer $customer
     *
     * @ORM\ManyToOne(targetEntity="AgencyDesk\DBBundle\Entity\User\Customer", inversedBy="servers")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id", nullable=true)
     */
    protected $customer;

    /**
     * @var string $server
     * @Encrypted
     *
     * @ORM\Column(name="server", type="string", length=255)
     */
    protected $server;

    /**
     * @var string $user
     * @Encrypted
     *
     * @ORM\Column(name="user", type="string", length=255)
     */
    protected $user;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=255)
     * @Encrypted
     */
    protected $password;

    /**
     * @var string $userDa
     * @Encrypted
     *
     * @ORM\Column(name="user_da", type="string", length=255)
     */
    protected $userDa;

    /**
     * @var string $passwordDa
     *
     * @ORM\Column(name="password_da", type="string", length=255)
     * @Encrypted
     */
    protected $passwordDa;

    /**
     * @var string $userSql
     * @Encrypted
     *
     * @ORM\Column(name="user_sql", type="string", length=255)
     */
    protected $userSql;

    /**
     * @var string $passwordSql
     *
     * @ORM\Column(name="password_sql", type="string", length=255)
     * @Encrypted
     */
    protected $passwordSql;


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
     * Constructor
     */


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
     * Set title
     *
     * @param string $title
     *
     * @return Servers
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set server
     *
     * @param string $server
     *
     * @return Servers
     */
    public function setServer($server)
    {
        $this->server = $server;

        return $this;
    }

    /**
     * Get server
     *
     * @return string
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Servers
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
     * @return Servers
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
     * Set customer
     *
     * @param \AgencyDesk\DBBundle\Entity\User\Customer $customer
     *
     * @return Servers
     */
    public function setCustomer(\AgencyDesk\DBBundle\Entity\User\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \AgencyDesk\DBBundle\Entity\User\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set user
     *
     * @param string $user
     *
     * @return Server
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Server
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set userDa
     *
     * @param string $userDa
     *
     * @return Server
     */
    public function setUserDa($userDa)
    {
        $this->userDa = $userDa;

        return $this;
    }

    /**
     * Get userDa
     *
     * @return string
     */
    public function getUserDa()
    {
        return $this->userDa;
    }

    /**
     * Set passwordDa
     *
     * @param string $passwordDa
     *
     * @return Server
     */
    public function setPasswordDa($passwordDa)
    {
        $this->passwordDa = $passwordDa;

        return $this;
    }

    /**
     * Get passwordDa
     *
     * @return string
     */
    public function getPasswordDa()
    {
        return $this->passwordDa;
    }

    /**
     * Set userSql
     *
     * @param string $userSql
     *
     * @return Server
     */
    public function setUserSql($userSql)
    {
        $this->userSql = $userSql;

        return $this;
    }

    /**
     * Get userSql
     *
     * @return string
     */
    public function getUserSql()
    {
        return $this->userSql;
    }

    /**
     * Set passwordSql
     *
     * @param string $passwordSql
     *
     * @return Server
     */
    public function setPasswordSql($passwordSql)
    {
        $this->passwordSql = $passwordSql;

        return $this;
    }

    /**
     * Get passwordSql
     *
     * @return string
     */
    public function getPasswordSql()
    {
        return $this->passwordSql;
    }
}
