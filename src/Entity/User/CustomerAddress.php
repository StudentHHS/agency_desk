<?php

namespace AgencyDesk\DBBundle\Entity\User;

use AgencyDesk\DBBundle\Entity\Project\Project;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use AgencyDesk\DBBundle\Entity\User\Customer;

/**
 * AgencyDesk\DBBundle\Entity\User\CustomerAddress
 *
 * @ORM\Table(name = "customer_address")
 * @ORM\Entity
 */
class CustomerAddress {
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var AddressType $type
     *
     * @ORM\ManyToOne(targetEntity="AgencyDesk\DBBundle\Entity\User\AddressType")
     * @ORM\JoinColumn(name="address_type_id", referencedColumnName="id")
     */
    protected $type;

    /**
     * @var Customer $customer
     *
     * @ORM\ManyToOne(targetEntity="AgencyDesk\DBBundle\Entity\User\Customer")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    protected $customer;

    /**
     * @var Address $address
     *
     * @ORM\ManyToOne(targetEntity="AgencyDesk\DBBundle\Entity\User\Address")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    protected $address;

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
     * Set created
     *
     * @param \DateTime $created
     * @return CustomerAddress
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
     * @return CustomerAddress
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
     * Set type
     *
     * @param \AgencyDesk\DBBundle\Entity\User\AddressType $type
     * @return CustomerAddress
     */
    public function setType(\AgencyDesk\DBBundle\Entity\User\AddressType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AgencyDesk\DBBundle\Entity\User\AddressType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set customer
     *
     * @param \AgencyDesk\DBBundle\Entity\User\Customer $customer
     * @return CustomerAddress
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
     * Set address
     *
     * @param \AgencyDesk\DBBundle\Entity\User\Address $address
     * @return CustomerAddress
     */
    public function setAddress(\AgencyDesk\DBBundle\Entity\User\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \AgencyDesk\DBBundle\Entity\User\Address
     */
    public function getAddress()
    {
        return $this->address;
    }
}
