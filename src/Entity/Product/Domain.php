<?php

namespace App\Entity\Product;

use App\Entity\System\Country;
use App\Entity\User\Customer;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * App\Entity\User\Address
 *
 * @ORM\Table(name="domain")
 * @ORM\Entity
 */
class Domain {
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
     * @ORM\ManyToOne(targetEntity="App\Entity\User\Customer")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id", onDelete="cascade")
     */
    protected $customer;

	/**
	 * @var string $domain
	 *
	 * @ORM\Column(name="domain", type="string", length=255, nullable=true)
	 */
	protected $domain;

    /**
     * @var Customer $tld
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Product\Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", onDelete="cascade")
     */
    protected $product;

    /**
     * @var DomainState $state
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Product\DomainState")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id", onDelete="cascade")
     */
    protected $state;

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
     * @ORM\Column(name="housenumber", type="integer", nullable=true)
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
     * @ORM\ManyToOne(targetEntity="App\Entity\System\Country")
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
     * @ORM\OneToMany(targetEntity="App\Entity\Project\Project", mappedBy="customer", cascade={"persist", "remove"}, orphanRemoval=true)
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
     * Constructor
     */
    public function __construct()
    {
        $this->projects = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set domain
     *
     * @param string $domain
     * @return Domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    
        return $this;
    }

    /**
     * Get domain
     *
     * @return string 
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set department
     *
     * @param string $department
     * @return Domain
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
     * Set address
     *
     * @param string $address
     * @return Domain
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
     * Set housenumber
     *
     * @param integer $housenumber
     * @return Domain
     */
    public function setHousenumber($housenumber)
    {
        $this->housenumber = $housenumber;
    
        return $this;
    }

    /**
     * Get housenumber
     *
     * @return integer 
     */
    public function getHousenumber()
    {
        return $this->housenumber;
    }

    /**
     * Set extension
     *
     * @param string $extension
     * @return Domain
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
     * Set zipcode
     *
     * @param string $zipcode
     * @return Domain
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
     * @return Domain
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
     * @return Domain
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
     * @return Domain
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
     * @return Domain
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
     * @return Domain
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
     * @return Domain
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
     * @return Domain
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
     * Set product
     *
     * @param \App\Entity\Product\Product $product
     * @return Domain
     */
    public function setProduct(\App\Entity\Product\Product $product = null)
    {
        $this->product = $product;
    
        return $this;
    }

    /**
     * Get product
     *
     * @return \App\Entity\Product\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set state
     *
     * @param \App\Entity\Product\DomainState $state
     * @return Domain
     */
    public function setState(\App\Entity\Product\DomainState $state = null)
    {
        $this->state = $state;
    
        return $this;
    }

    /**
     * Get state
     *
     * @return \App\Entity\Product\DomainState
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set country
     *
     * @param \App\Entity\System\Country $country
     * @return Domain
     */
    public function setCountry(\App\Entity\System\Country $country = null)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return \App\Entity\System\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Add projects
     *
     * @param \App\Entity\Project\Project $projects
     * @return Domain
     */
    public function addProject(\App\Entity\Project\Project $projects)
    {
        $this->projects[] = $projects;
    
        return $this;
    }

    /**
     * Remove projects
     *
     * @param \App\Entity\Project\Project $projects
     */
    public function removeProject(\App\Entity\Project\Project $projects)
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
}
