<?php

namespace AgencyDesk\DBBundle\Entity\Project;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * AgencyDesk\DBBundle\Entity\Project\Accounts
 *
 * @ORM\Table(name = "accounts")
 * @ORM\Entity
 */
class Accounts {
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $salt
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $salt;

    /**
     * @var string $mysql_url
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $mysql_url;

    /**
     * @var string $mysql_user
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $mysql_user;

    /**
     * @var string $mysql_password
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $mysql_password;

    /**
     * @var string $ftp_url
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $ftp_url;

    /**
     * @var string $ftp_user
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $ftp_user;

    /**
     * @var string $ftp_password
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $ftp_password;

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
     * Set salt
     *
     * @param string $salt
     * @return Accounts
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set mysql_url
     *
     * @param string $mysqlUrl
     * @return Accounts
     */
    public function setMysqlUrl($mysqlUrl)
    {
        $this->mysql_url = $mysqlUrl;

        return $this;
    }

    /**
     * Get mysql_url
     *
     * @return string
     */
    public function getMysqlUrl()
    {
        return $this->mysql_url;
    }

    /**
     * Set mysql_user
     *
     * @param string $mysqlUser
     * @return Accounts
     */
    public function setMysqlUser($mysqlUser)
    {
        $this->mysql_user = $mysqlUser;

        return $this;
    }

    /**
     * Get mysql_user
     *
     * @return string
     */
    public function getMysqlUser()
    {
        return $this->mysql_user;
    }

    /**
     * Set mysql_password
     *
     * @param string $mysqlPassword
     * @return Accounts
     */
    public function setMysqlPassword($mysqlPassword)
    {
        $this->mysql_password = $mysqlPassword;

        return $this;
    }

    /**
     * Get mysql_password
     *
     * @return string
     */
    public function getMysqlPassword()
    {
        return $this->mysql_password;
    }

    /**
     * Set ftp_url
     *
     * @param string $ftpUrl
     * @return Accounts
     */
    public function setFtpUrl($ftpUrl)
    {
        $this->ftp_url = $ftpUrl;

        return $this;
    }

    /**
     * Get ftp_url
     *
     * @return string
     */
    public function getFtpUrl()
    {
        return $this->ftp_url;
    }

    /**
     * Set ftp_user
     *
     * @param string $ftpUser
     * @return Accounts
     */
    public function setFtpUser($ftpUser)
    {
        $this->ftp_user = $ftpUser;

        return $this;
    }

    /**
     * Get ftp_user
     *
     * @return string
     */
    public function getFtpUser()
    {
        return $this->ftp_user;
    }

    /**
     * Set ftp_password
     *
     * @param string $ftpPassword
     * @return Accounts
     */
    public function setFtpPassword($ftpPassword)
    {
        $this->ftp_password = $ftpPassword;

        return $this;
    }

    /**
     * Get ftp_password
     *
     * @return string
     */
    public function getFtpPassword()
    {
        return $this->ftp_password;
    }
}
