<?php

namespace App\Entity\Financial;

use App\Entity\System\VatTariff;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * InvoiceLine
 *
 * @ORM\Table(name="invoice_line")
 * @ORM\Entity
 */
class InvoiceLine
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
     * @var Invoice $invoice
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Financial\Invoice")
     * @ORM\JoinColumn(name="invoice_id", referencedColumnName="id", onDelete="cascade")
     */
    protected $invoice;

    /**
     * @var integer $quantity
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    protected $quantity;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    protected $description;

    /**
     * @var decimal $price
     *
     * @ORM\Column(name="price", type="decimal", length=10, scale=2)
     */
    private $price;

    /**
     * @var VatTariff $vatTariff
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\System\VatTariff")
     * @ORM\JoinColumn(name="vat_tariff_id", referencedColumnName="id", onDelete="cascade")
     */
    protected $vatTariff;

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
     * Set quantity
     *
     * @param integer $quantity
     * @return InvoiceLine
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    
        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return InvoiceLine
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

    /**
     * Set price
     *
     * @param string $price
     * @return InvoiceLine
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
     * Set created
     *
     * @param \DateTime $created
     * @return InvoiceLine
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
     * @return InvoiceLine
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
     * Set invoice
     *
     * @param \App\Entity\Financial\Invoice $invoice
     * @return InvoiceLine
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
     * Set vatTariff
     *
     * @param \App\Entity\System\VatTariff $vatTariff
     * @return InvoiceLine
     */
    public function setVatTariff(\App\Entity\System\VatTariff $vatTariff = null)
    {
        $this->vatTariff = $vatTariff;
    
        return $this;
    }

    /**
     * Get vatTariff
     *
     * @return \App\Entity\System\VatTariff
     */
    public function getVatTariff()
    {
        return $this->vatTariff;
    }
}
