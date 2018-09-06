<?php

namespace AgencyDesk\DBBundle\Entity\Financial;

use AgencyDesk\DBBundle\Entity\User\Customer;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Invoice
 *
 * @ORM\Table(name="credit__card")
 * @ORM\Entity
 */
class CreditCard
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
     * @var Customer $customer
     *
     * @ORM\ManyToOne(targetEntity="AgencyDesk\DBBundle\Entity\User\Customer", inversedBy="creditcards")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id", onDelete="cascade")
     */
    protected $customer;

    /**
     * @var decimal $price
     *
     * @ORM\Column(name="price", type="decimal", length=10, scale=2, nullable=true)
     */
    public $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="start_credit", type="integer")
     */
    private $startCredit = 0;

    /**
     * @ORM\OneToMany(targetEntity="AgencyDesk\DBBundle\Entity\Financial\Transaction", mappedBy="creditCard")
     */
    protected $transactions;

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
     * Set startCredit
     *
     * @param integer $startCredit
     *
     * @return CreditCard
     */
    public function setStartCredit($startCredit)
    {
        $this->startCredit = $startCredit;

        return $this;
    }

    /**
     * Get startCredit
     *
     * @return integer
     */
    public function getStartCredit()
    {
        return $this->startCredit;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return CreditCard
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
     * @return CreditCard
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
     * @return CreditCard
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
     * Constructor
     */
    public function __construct()
    {
        $this->transactions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add transaction
     *
     * @param \AgencyDesk\DBBundle\Entity\Financial\Transaction $transaction
     *
     * @return CreditCard
     */
    public function addTransaction(\AgencyDesk\DBBundle\Entity\Financial\Transaction $transaction)
    {
        $this->transactions[] = $transaction;

        return $this;
    }

    /**
     * Remove transaction
     *
     * @param \AgencyDesk\DBBundle\Entity\Financial\Transaction $transaction
     */
    public function removeTransaction(\AgencyDesk\DBBundle\Entity\Financial\Transaction $transaction)
    {
        $this->transactions->removeElement($transaction);
    }

    /**
     * Get transactions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return CreditCard
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }
}
