<?php

namespace App\Entity\Financial;

use App\Entity\User\Customer;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Invoice
 *
 * @ORM\Table(name="invoice")
 * @ORM\Entity
 */
class Invoice
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
     * @var integer
     *
     * @ORM\Column(name="invoiceNr", type="integer")
     */
    private $invoiceNr;

    /**
     * @var InvoiceState $state
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Financial\InvoiceState")
     * @ORM\JoinColumn(name="stateId", referencedColumnName="id", onDelete="cascade")
     */
    protected $state;

    /**
     * @var Customer $customer
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User\Customer")
     * @ORM\JoinColumn(name="customerId", referencedColumnName="id", onDelete="cascade")
     */
    protected $customer;

    /**
     * @var boolean $credit
     *
     * @ORM\Column(name="credit", type="boolean", nullable=false )
     */
    protected $credit = false;

    /**
     * @var boolean $paid
     *
     * @ORM\Column(name="paid", type="boolean")
     */
    protected $paid = false;

    /**
     * @var string $reasonFree
     *
     * @ORM\Column(name="reasonFree", type="string", length=255, nullable=true)
     */
    protected $reasonFree;

    /**
     * @var date $date
     *
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @var date $paymentDate
     *
     * @ORM\Column(name="paymentDate", type="date", nullable=true)
     */
    private $paymentDate;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Financial\InvoiceLine", mappedBy="invoice")
     */
    private $lines;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Project\ActualWork", mappedBy="invoice")
     */
    private $actualWork;

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
        $this->lines = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set invoiceNr
     *
     * @param integer $invoiceNr
     * @return Invoice
     */
    public function setInvoiceNr($invoiceNr)
    {
        $this->invoiceNr = $invoiceNr;

        return $this;
    }

    /**
     * Get invoiceNr
     *
     * @return integer
     */
    public function getInvoiceNr()
    {
        return $this->invoiceNr;
    }

    /**
     * Set credit
     *
     * @param boolean $credit
     * @return Invoice
     */
    public function setCredit($credit)
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * Get credit
     *
     * @return boolean
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Invoice
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set paymentDate
     *
     * @param \DateTime $paymentDate
     * @return Invoice
     */
    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    /**
     * Get paymentDate
     *
     * @return date
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Invoice
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return datetime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Invoice
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return datetime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set state
     *
     * @param \App\Entity\Financial\InvoiceState $state
     * @return Invoice
     */
    public function setState(\App\Entity\Financial\InvoiceState $state = null)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return \App\Entity\Financial\InvoiceState
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set customer
     *
     * @param \App\Entity\User\Customer $customer
     * @return Invoice
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
     * Add lines
     *
     * @param \App\Entity\Financial\InvoiceLine $lines
     * @return Invoice
     */
    public function addLine(\App\Entity\Financial\InvoiceLine $lines)
    {
        $this->lines[] = $lines;

        return $this;
    }

    /**
     * Remove lines
     *
     * @param \App\Entity\Financial\InvoiceLine $lines
     */
    public function removeLine(\App\Entity\Financial\InvoiceLine $lines)
    {
        $this->lines->removeElement($lines);
    }

    /**
     * Get lines
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLines()
    {
        return $this->lines;
    }

    /**
     * Set paid
     *
     * @param boolean $paid
     *
     * @return Invoice
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
     * @return Invoice
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

    public function getInvoiceTotal()
    {
        $dTotal = 0.00;
        /** @var InvoiceLine $oInvoiceLine */
        foreach($this->getLines() as $oInvoiceLine)
        {
            $dTotal += ($oInvoiceLine->getQuantity() * $oInvoiceLine->getPrice() * (1 + ($oInvoiceLine->getVatTariff()->getTariff() / 100)));
        }
        return $dTotal;
    }


    /**
     * Add actualWork
     *
     * @param \App\Entity\Project\ActualWork $actualWork
     *
     * @return Invoice
     */
    public function addActualWork(\App\Entity\Project\ActualWork $actualWork)
    {
        $this->actualWork[] = $actualWork;

        return $this;
    }

    /**
     * Remove actualWork
     *
     * @param \App\Entity\Project\ActualWork $actualWork
     */
    public function removeActualWork(\App\Entity\Project\ActualWork $actualWork)
    {
        $this->actualWork->removeElement($actualWork);
    }

    /**
     * Get actualWork
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActualWork()
    {
        return $this->actualWork;
    }
}
