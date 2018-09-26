<?php

namespace App\Entity\Project;

use App\Entity\User\Customer;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Security\Core\User\User;

/**
 * App\Entity\Project\Project
 *
 * @ORM\Table(name = "project")
 * @ORM\Entity
 */
class Project
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
     * @var Customer $customer
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User\Customer", inversedBy="projects")
     * @ORM\JoinColumn(name="customerId", referencedColumnName="id", nullable=true)
     */
    protected $customer;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    protected $title;

    /**
     * @var string $body
     *
     * @ORM\Column(name="body", type="text", nullable=true)
     */
    protected $body;

    /**
     * @var string $gitUrl
     *
     * @ORM\Column(name="gitUrl", type="string", length=255, nullable=true)
     */
    protected $gitUrl;

    /**
     * @var string $productionUrl
     *
     * @ORM\Column(name="productionUrl", type="string", length=255, nullable=true)
     */
    protected $productionUrl;

    /**
     * @var string $developmentUrl
     *
     * @ORM\Column(name="developmentUrl", type="string", length=255, nullable=true)
     */
    protected $developmentUrl;

    /**
     * @var User $user
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User\User", fetch="EAGER")
     * @ORM\JoinColumn(name="userId", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var User $accounts
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Project\Accounts", fetch="EAGER")
     * @ORM\JoinColumn(name="accountId", referencedColumnName="id")
     */
    protected $accounts;

    /**
     * @ORM\OneToMany(targetEntity="\App\Entity\Project\ReleaseCandidate", mappedBy="project", cascade={"persist"})
     * @ORM\OrderBy({"scheduled_release_date" = "DESC"})
     * @var \Doctrine\Common\Collections\Collection $releaseCandidates
     */
    protected $releaseCandidates;

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
     * Constructor
     */
    public function __construct()
    {
        $this->releaseCandidates = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return Project
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
     * Set body
     *
     * @param string $body
     *
     * @return Project
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set gitUrl
     *
     * @param string $gitUrl
     *
     * @return Project
     */
    public function setGitUrl($gitUrl)
    {
        $this->gitUrl = $gitUrl;

        return $this;
    }

    /**
     * Get gitUrl
     *
     * @return string
     */
    public function getGitUrl()
    {
        return $this->gitUrl;
    }

    /**
     * Set productionUrl
     *
     * @param string $productionUrl
     *
     * @return Project
     */
    public function setProductionUrl($productionUrl)
    {
        $this->productionUrl = $productionUrl;

        return $this;
    }

    /**
     * Get productionUrl
     *
     * @return string
     */
    public function getProductionUrl()
    {
        return $this->productionUrl;
    }

    /**
     * Set developmentUrl
     *
     * @param string $developmentUrl
     *
     * @return Project
     */
    public function setDevelopmentUrl($developmentUrl)
    {
        $this->developmentUrl = $developmentUrl;

        return $this;
    }

    /**
     * Get developmentUrl
     *
     * @return string
     */
    public function getDevelopmentUrl()
    {
        return $this->developmentUrl;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Project
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
     *
     * @return Project
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
     * @return Project
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
     * @param \App\Entity\User\Customer $customer
     *
     * @return Project
     */
    public function setCustomer(\App\Entity\User\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \App\Entity\User\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set user
     *
     * @param \App\Entity\User\User $user
     *
     * @return Project
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
     * Set accounts
     *
     * @param \App\Entity\Project\Accounts $accounts
     *
     * @return Project
     */
    public function setAccounts(\App\Entity\Project\Accounts $accounts = null)
    {
        $this->accounts = $accounts;

        return $this;
    }

    /**
     * Get accounts
     *
     * @return \App\Entity\Project\Accounts
     */
    public function getAccounts()
    {
        return $this->accounts;
    }

    /**
     * Add releaseCandidate
     *
     * @param \App\Entity\Project\ReleaseCandidate $releaseCandidate
     *
     * @return Project
     */
    public function addReleaseCandidate(\App\Entity\Project\ReleaseCandidate $releaseCandidate)
    {
        $this->releaseCandidates[] = $releaseCandidate;

        return $this;
    }

    /**
     * Remove releaseCandidate
     *
     * @param \App\Entity\Project\ReleaseCandidate $releaseCandidate
     */
    public function removeReleaseCandidate(\App\Entity\Project\ReleaseCandidate $releaseCandidate)
    {
        $this->releaseCandidates->removeElement($releaseCandidate);
    }

    /**
     * Get releaseCandidates
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReleaseCandidates()
    {
        return $this->releaseCandidates;
    }
}
