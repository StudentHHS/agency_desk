<?php

namespace App\Entity\User;

use App\Entity\System\LegalForm;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * App\Entity\User\Customer
 *
 * @ORM\Table(name = "customer")
 * @ORM\Entity
 */
class Customer {
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
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    protected $title;

    /**
     * @var string $street
     *
     * @ORM\Column(name="street", type="string", length=255, nullable=true)
     */
    protected $street;

    /**
     * @var string $taxnumber
     *
     * @ORM\Column(name="taxnumber", type="string", length=255, nullable=true)
     */
    protected $taxnumber;

    /**
     * @var string $kvknumber
     *
     * @ORM\Column(name="kvknumber", type="string", length=255, nullable=true)
     */
    protected $kvknumber;
    /**
     * @var string $phone
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    protected $phone;
    /**
     * @var string $fax
     *
     * @ORM\Column(name="fax", type="string", length=255, nullable=true)
     */
    protected $fax;

    /**
     * @var string $company_name
     *
     * @ORM\Column(name="company_name", type="string", length=255, nullable=true)
     */
    protected $company_name;

    /**
     * @var string $old_id
     *
     * @ORM\Column(name="old_id", type="string", length=255, nullable=true)
     */
    protected $old_id;

    /**
     * @var AddressType $type
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User\AddressType")
     * @ORM\JoinColumn(name="type", referencedColumnName="id", nullable=true)
     */
    protected $type;

    /**
     * @var LegalForm $legalForm
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\System\LegalForm")
     * @ORM\JoinColumn(name="legal_form_id", referencedColumnName="id", onDelete="cascade")
     */
    protected $legalForm;

    /**
     * @var string $vatNumber
     *
     * @ORM\Column(name="vat_number", type="string", length=255, nullable=true)
     */
    protected $vatNumber;

    /**
     * @var User $owner
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     */
    protected $owner;

    /**
     * @var boolean $active
     *
     * @ORM\Column(name="active", type="boolean", nullable=false )
     */
    protected $active = false;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Financial\CreditCard", mappedBy="customer", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $creditcards;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Project\Project", mappedBy="customer", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\OrderBy({"sequence" = "ASC"})
     */
    private $projects;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User\CustomerContact", mappedBy="customer", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\OrderBy({"sequence" = "ASC"})
     */
    private $customerContact;


    /**
     * @var decimal $hourlyRate
     *
     * @ORM\Column(name="hourly_rate", type="decimal", scale=2, precision=10, nullable=true)
     */
    protected $hourlyRate;

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

    public function __toString()
    {
        return $this->getName();
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
     * Set name
     *
     * @param string $name
     * @return Customer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->firstname. " " .$this->lastname;
    }

    /**
     * Set vatNumber
     *
     * @param string $vatNumber
     * @return Customer
     */
    public function setVatNumber($vatNumber)
    {
        $this->vatNumber = $vatNumber;

        return $this;
    }

    /**
     * Get vatNumber
     *
     * @return string
     */
    public function getVatNumber()
    {
        return $this->vatNumber;
    }

    /**
     * Set kvkNumber
     *
     * @param string $kvkNumber
     * @return Customer
     */
    public function setKvkNumber($kvkNumber)
    {
        $this->kvkNumber = $kvkNumber;

        return $this;
    }

    /**
     * Get kvkNumber
     *
     * @return string
     */
    public function getKvkNumber()
    {
        return $this->kvknumber;
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
     * Set created
     *
     * @param \DateTime $created
     * @return Customer
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
     * @return Customer
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
     * Set legalForm
     *
     * @param \App\Entity\System\LegalForm $legalForm
     * @return Customer
     */
    public function setLegalForm(\App\Entity\System\LegalForm $legalForm = null)
    {
        $this->legalForm = $legalForm;

        return $this;
    }

    /**
     * Get legalForm
     *
     * @return \App\Entity\System\LegalForm
     */
    public function getLegalForm()
    {
        return $this->legalForm;
    }

    /**
     * Set owner
     *
     * @param \App\Entity\User\User $owner
     * @return Customer
     */
    public function setOwner(\App\Entity\User\User $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \App\Entity\User\User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Add projects
     *
     * @param \App\Entity\Project\Project $projects
     * @return Customer
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

    /**
     * Add customerContacts
     *
     * @param \App\Entity\User\CustomerContact $customerContact
     * @return Customer
     */
    public function addCustomerContact(\App\Entity\User\CustomerContact $customerContact)
    {
        $this->customerContact[] = $customerContact;

        return $this;
    }

    /**
     * Remove customerContact
     *
     * @param \App\Entity\User\CustomerContact $customerContact
     */
    public function removeCustomerContact(\App\Entity\User\CustomerContact $customerContact)
    {
        $this->customerContact->removeElement($customerContact);
    }

    /**
     * Get customerContact
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCustomerContact()
    {
        return $this->customerContact;
    }

    /**
     * Set title
     *
     * @param string $title
     *
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
     * Set street
     *
     * @param string $street
     *
     * @return Customer
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set taxnumber
     *
     * @param string $taxnumber
     *
     * @return Customer
     */
    public function setTaxnumber($taxnumber)
    {
        $this->taxnumber = $taxnumber;

        return $this;
    }

    /**
     * Get taxnumber
     *
     * @return string
     */
    public function getTaxnumber()
    {
        return $this->taxnumber;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Customer
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     *
     * @return Customer
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set companyName
     *
     * @param string $companyName
     *
     * @return Customer
     */
    public function setCompanyName($companyName)
    {
        $this->company_name = $companyName;

        return $this;
    }

    /**
     * Get companyName
     *
     * @return string
     */
    public function getCompanyName()
    {
        return $this->company_name;
    }

    /**
     * Set oldId
     *
     * @param string $oldId
     *
     * @return Customer
     */
    public function setOldId($oldId)
    {
        $this->old_id = $oldId;

        return $this;
    }

    /**
     * Get oldId
     *
     * @return string
     */
    public function getOldId()
    {
        return $this->old_id;
    }

    /**
     * Set type
     *
     * @param \App\Entity\User\AddressType $type
     *
     * @return Customer
     */
    public function setType(\App\Entity\User\AddressType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \App\Entity\User\AddressType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add creditcard
     *
     * @param \App\Entity\Financial\CreditCard $creditcard
     *
     * @return Customer
     */
    public function addCreditcard(\App\Entity\Financial\CreditCard $creditcard)
    {
        $this->creditcards[] = $creditcard;

        return $this;
    }

    /**
     * Remove creditcard
     *
     * @param \App\Entity\Financial\CreditCard $creditcard
     */
    public function removeCreditcard(\App\Entity\Financial\CreditCard $creditcard)
    {
        $this->creditcards->removeElement($creditcard);
    }

    /**
     * Get creditcards
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCreditcards()
    {
        return $this->creditcards;
    }

    /**
     * Set hourlyRate
     *
     * @param string $hourlyRate
     *
     * @return Customer
     */
    public function setHourlyRate($hourlyRate)
    {
        $this->hourlyRate = $hourlyRate;

        return $this;
    }

    /**
     * Get hourlyRate
     *
     * @return string
     */
    public function getHourlyRate()
    {
        return $this->hourlyRate;
    }
}
