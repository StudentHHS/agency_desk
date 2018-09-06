<?php

namespace AgencyDesk\DBBundle\Entity\User;

use AgencyDesk\DBBundle\Entity\Project\Project;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use AgencyDesk\DBBundle\Entity\User\Customer;

/**
 * AgencyDesk\DBBundle\Entity\User\CustomerProject
 *
 * @ORM\Table(name = "customer_project")
 * @ORM\Entity
 */
class CustomerProject {
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
     * @ORM\ManyToOne(targetEntity="AgencyDesk\DBBundle\Entity\User\Customer")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    protected $customer;

    /**
     * @var Project $Project
     *
     * @ORM\ManyToOne(targetEntity="AgencyDesk\DBBundle\Entity\Project\Project")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    protected $project;

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
     * Set Customer
     *
     * @param \AgencyDesk\DBBundle\Entity\User\Customer $customer
     * @return CustomerProject
     */
    public function setCustomer(\AgencyDesk\DBBundle\Entity\User\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get Customer
     *
     * @return \AgencyDesk\DBBundle\Entity\User\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set Project
     *
     * @param \AgencyDesk\DBBundle\Entity\Project\Project $project
     * @return CustomerProject
     */
    public function setProject(\AgencyDesk\DBBundle\Entity\Project\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get Project
     *
     * @return \AgencyDesk\DBBundle\Entity\Project\Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return CustomerProject
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
     * @return CustomerProject
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
}
