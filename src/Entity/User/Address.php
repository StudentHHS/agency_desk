<?php

namespace AgencyDesk\DBBundle\Entity\User;

use AgencyDesk\DBBundle\Entity\System\Country;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * AgencyDesk\DBBundle\Entity\User\Address
 *
 * @ORM\Table(name = "address")
 * @ORM\Entity
 */
class Address {
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
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $title;

    /**
     * @var string $department
     *
     * @ORM\Column(name="department", type="string", length=255, nullable=true)
     */
    protected $department;

    /**
     * @var string $address
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $address;

    /**
     * @var integer $housenumber
     *
     * @ORM\Column(name="housenumber", type="string", nullable=true)
     */
    protected $housenumber;

    /**
     * @var string $extension
     *
     * @ORM\Column(name="extension", type="string", length=255, nullable=true)
     */
    protected $extension;

    /**
     * @var string $zipcode
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $zipcode;

    /**
     * @var string $city
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $city;

    /**
     * @var Country $country
     *
     * @ORM\ManyToOne(targetEntity="AgencyDesk\DBBundle\Entity\System\Country", fetch="EAGER")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id", onDelete="cascade")
     */
    protected $country;

    /**
     * @var string $contact_email
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $contact_email;

    /**
     * @var string $contact_phone
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $contact_phone;

    /**
     * @var boolean $active
     *
     * @ORM\Column(name="active", type="boolean", nullable=false )
     */
    protected $active = false;

    /**
     * @ORM\OneToMany(targetEntity="AgencyDesk\DBBundle\Entity\Project\Project", mappedBy="customer", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\OrderBy({"sequence" = "ASC"})
     * @var \Doctrine\Common\Collections\Collection $blocks
     */
    private $projects;

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
     * Set title
     *
     * @param string $title
     * @return Customer
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
     * Set address
     *
     * @param string $address
     * @return Customer
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zipcode
     *
     * @param string $zipcode
     * @return Customer
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Customer
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set contact_email
     *
     * @param string $contactEmail
     * @return Customer
     */
    public function setContactEmail($contactEmail)
    {
        $this->contact_email = $contactEmail;

        return $this;
    }

    /**
     * Get contact_email
     *
     * @return string
     */
    public function getContactEmail()
    {
        return $this->contact_email;
    }

    /**
     * Set contact_phone
     *
     * @param string $contactPhone
     * @return Customer
     */
    public function setContactPhone($contactPhone)
    {
        $this->contact_phone = $contactPhone;

        return $this;
    }

    /**
     * Get contact_phone
     *
     * @return string
     */
    public function getContactPhone()
    {
        return $this->contact_phone;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Customer
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
     * Set owner
     *
     * @param \AgencyDesk\DBBundle\Entity\User\Customer $owner
     * @return Customer
     */
    public function setOwner(Customer $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \AgencyDesk\DBBundle\Entity\User\Customer
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Customer
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->projects = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add projects
     *
     * @param \AgencyDesk\DBBundle\Entity\Project\Project $projects
     * @return Customer
     */
    public function addProject(\AgencyDesk\DBBundle\Entity\Project\Project $projects)
    {
        $this->projects[] = $projects;

        return $this;
    }

    /**
     * Remove projects
     *
     * @param \AgencyDesk\DBBundle\Entity\Project\Project $projects
     */
    public function removeProject(\AgencyDesk\DBBundle\Entity\Project\Project $projects)
    {
        $this->projects->removeElement($projects);
    }

    /**
     * Get projects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * Set department
     *
     * @param string $department
     * @return Address
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return string
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set housenumber
     *
     * @param string $housenumber
     * @return Address
     */
    public function setHousenumber($housenumber)
    {
        $this->housenumber = $housenumber;

        return $this;
    }

    /**
     * Get housenumber
     *
     * @return string
     */
    public function getHousenumber()
    {
        return $this->housenumber;
    }

    /**
     * Set extension
     *
     * @param string $extension
     * @return Address
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Address
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
     * @return Address
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
