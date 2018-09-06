<?php

namespace AgencyDesk\DBBundle\Entity\Phonebook;

use AgencyDesk\DBBundle\Entity\User\Customer;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Category
 *
 * @ORM\Table(name="phonebook__phonerecord")
 * @ORM\Entity
 */
class PhoneRecord
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var PhoneBook $phonebook
     *
     * @ORM\ManyToOne(targetEntity="AgencyDesk\DBBundle\Entity\Phonebook\PhoneBook", inversedBy="phonebook", cascade={"persist"})
     * @ORM\JoinColumn(name="phonebook_id", referencedColumnName="id", onDelete="NO ACTION")
     */
    protected $phonebook;

    /**
     * @var Customer $customer
     *
     * @ORM\ManyToOne(targetEntity="AgencyDesk\DBBundle\Entity\User\Customer", cascade={"persist"})
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id", onDelete="NO ACTION")
     */
    protected $customer;

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
     *
     * @return PhoneRecord
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
     * @return PhoneRecord
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
     * Set phonebook
     *
     * @param \AgencyDesk\DBBundle\Entity\Phonebook\PhoneBook $phonebook
     *
     * @return PhoneRecord
     */
    public function setPhonebook(\AgencyDesk\DBBundle\Entity\Phonebook\PhoneBook $phonebook = null)
    {
        $this->phonebook = $phonebook;

        return $this;
    }

    /**
     * Get phonebook
     *
     * @return \AgencyDesk\DBBundle\Entity\Phonebook\PhoneBook
     */
    public function getPhonebook()
    {
        return $this->phonebook;
    }

    /**
     * Set customer
     *
     * @param \AgencyDesk\DBBundle\Entity\User\Customer $customer
     *
     * @return PhoneRecord
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
}
