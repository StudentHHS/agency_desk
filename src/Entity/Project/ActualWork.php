<?php
namespace App\Entity\Project;

use App\Entity\Financial\CreditCard;
use App\Entity\Financial\Invoice;
use App\Entity\User\User;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use \DateTime;


/**
 * App\Entity\Project\ActualWork
 *
 * @ORM\Table(name = "actual_work")
 * @ORM\Entity()
 */
class ActualWork {
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var User $developer
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User\Developer", fetch="EAGER")
     * @ORM\JoinColumn(name="developer", referencedColumnName="id")
     */
    protected $developer;

    /**
     * @var CreditCard $creditCard
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Financial\CreditCard", cascade={"persist"})
     * @ORM\JoinColumn(name="credit_card_id", referencedColumnName="id", onDelete="NO ACTION", nullable=true)
     */
    protected $creditCard;

    /**
     * @var Invoice $invoice
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Financial\Invoice", inversedBy="actualWork", cascade={"persist"})
     * @ORM\JoinColumn(name="invoice_id", referencedColumnName="id", onDelete="NO ACTION", nullable=true)
     */
    protected $invoice;

    /**
     * @var Task $task
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Project\Task", fetch="EAGER")
     * @ORM\JoinColumn(name="task", referencedColumnName="id")
     */
    protected $task;

    /**
     * @var datetime $begin
     *
     * @Gedmo\Versioned
     * @ORM\Column(name="begin", type="datetime", nullable=true)
     */
    protected $begin;

    /**
     * @var datetime $end
     *
     * @Gedmo\Versioned
     * @ORM\Column(name="end", type="datetime", nullable=true)
     */
    protected $end;

    /**
     * @ORM\Column(name="time_past", type="integer")
     */
    protected $timePast;


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
     * Set begin
     *
     * @param \DateTime $begin
     * @return ActualWork
     */
    public function setBegin($begin)
    {
        $this->begin = $begin;

        return $this;
    }

    /**
     * Get begin
     *
     * @return \DateTime
     */
    public function getBegin()
    {
        return $this->begin;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     * @return ActualWork
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @return integer
     */
    public function getTimePast()
    {
        return $this->timePast;
    }

    /**
     * @param int $timePast
     */
    public function setTimePast(int $timePast): void
    {
        $this->timePast = $timePast;
    }

    /**
     * Get diff
     *
     * @return \DateTime
     */
    public function getDiff()
    {
        if($this->getEnd()==null)
            return "in progress";

        $start_date = $this->getBegin();
        $end_date = $this->getEnd();
        $interval = $start_date->diff($end_date);
        $return = $this->up($interval->d).":".$this->up($interval->h).":".$this->up($interval->i).":".$this->up($interval->s);
        return $return;
    }

    function up($int){
        if($int<10) return "0".$int;
        return $int;
    }

    /**
     * Set Task
     *
     * @param \App\Entity\Project\Task $task
     * @return ActualWork
     */
    public function setTask(\App\Entity\Project\Task $task = null)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get Task
     *
     * @return \App\Entity\Project\Task
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Set developer
     *
     * @param \App\Entity\User\Developer $developer
     * @return ActualWork
     */
    public function setDeveloper(\App\Entity\User\Developer $developer = null)
    {
        $this->developer = $developer;

        return $this;
    }

    /**
     * Get developer
     *
     * @return \App\Entity\User\Developer
     */
    public function getDeveloper()
    {
        return $this->developer;
    }

    /**
     * Set creditCard
     *
     * @param \App\Entity\Financial\CreditCard $creditCard
     *
     * @return ActualWork
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
     * Set invoice
     *
     * @param \App\Entity\Financial\Invoice $invoice
     *
     * @return ActualWork
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
}
