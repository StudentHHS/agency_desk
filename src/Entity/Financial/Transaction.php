<?php

namespace App\Entity\Financial;

use App\Entity\Project\ActualWork;
use App\Entity\User\Customer;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Invoice
 *
 * @ORM\Table(name="transaction")
 * @ORM\Entity
 */
class Transaction
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
     * @var CreditCard $creditCard
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Financial\CreditCard", inversedBy="transactions", cascade={"persist"})
     * @ORM\JoinColumn(name="credit_card", referencedColumnName="id", onDelete="NO ACTION")
     */
    protected $creditCard;

    /**
     * @var Invoice $invoice
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Financial\Invoice")
     * @ORM\JoinColumn(name="invoice_id", referencedColumnName="id", onDelete="cascade")
     */
    protected $invoice;

    /**
     * @var ActualWork $worklog
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Project\ActualWork", inversedBy="transactions", cascade={"persist"})
     * @ORM\JoinColumn(name="worklog_id", referencedColumnName="id", onDelete="NO ACTION")
     */
    protected $workLog;

    /**
     * @var integer $amount_credit
     *
     * @ORM\Column(name="amount_credit", type="decimal", length=10, scale=2, nullable=true)
     */
    protected $amount_credit = 0;

    /**
     * @var integer $amount_debit
     *
     * @ORM\Column(name="amount_debit", type="decimal", length=10, scale=2, nullable=true)
     */
    protected $amount_debit = 0;

    /**
     * @var text
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description = 0;

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
     * Set price
     *
     * @param string $price
     *
     * @return Transaction
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

    /**
     * Set amountCredit
     *
     * @param string $amountCredit
     *
     * @return Transaction
     */
    public function setAmountCredit($amountCredit)
    {
        $this->amount_credit = $amountCredit;

        return $this;
    }

    /**
     * Get amountCredit
     *
     * @return string
     */
    public function getAmountCredit()
    {
        return $this->amount_credit;
    }

    /**
     * Set amountDebit
     *
     * @param string $amountDebit
     *
     * @return Transaction
     */
    public function setAmountDebit($amountDebit)
    {
        $this->amount_debit = $amountDebit;

        return $this;
    }

    /**
     * Get amountDebit
     *
     * @return string
     */
    public function getAmountDebit()
    {
        return $this->amount_debit;
    }

    /**
     * Set externalId
     *
     * @param string $externalId
     *
     * @return Transaction
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * Get externalId
     *
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * Set paid
     *
     * @param boolean $paid
     *
     * @return Transaction
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * Get paid
     *
     * @return boolean
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * Set reasonFree
     *
     * @param string $reasonFree
     *
     * @return Transaction
     */
    public function setReasonFree($reasonFree)
    {
        $this->reasonFree = $reasonFree;

        return $this;
    }

    /**
     * Get reasonFree
     *
     * @return string
     */
    public function getReasonFree()
    {
        return $this->reasonFree;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Transaction
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
     * @return Transaction
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
     * @return Transaction
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
     * Set invoice
     *
     * @param \App\Entity\Financial\Invoice $invoice
     *
     * @return Transaction
     */
    public function setInvoice(\App\Entity\Financial\Invoice $invoice = null)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Get invoice
     *
     * @return \App\Entity\Financial\Invoice
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * Set workLog
     *
     * @param \App\Entity\Project\ActualWork $workLog
     *
     * @return Transaction
     */
    public function setWorkLog(\App\Entity\Project\ActualWork $workLog = null)
    {
        $this->workLog = $workLog;

        return $this;
    }

    /**
     * Get workLog
     *
     * @return \App\Entity\Project\ActualWork
     */
    public function getWorkLog()
    {
        return $this->workLog;
    }

    /**
     * Set creditCard
     *
     * @param \App\Entity\Financial\CreditCard $creditCard
     *
     * @return Transaction
     */
    public function setCreditCard(\App\Entity\Financial\CreditCard $creditCard = null)
    {
        $this->creditCard = $creditCard;

        return $this;
    }

    /**
     * Get creditCard
     *
     * @return \App\Entity\Financial\CreditCard
     */
    public function getCreditCard()
    {
        return $this->creditCard;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Transaction
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
