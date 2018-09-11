<?php
namespace App\Entity\Project;

use App\Entity\Project\Task;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * AgencyDesk\DBBundle\Entity\Project\ScheduledWork
 *
 * @ORM\Table(name = "scheduled_work")
 * @ORM\Entity
 */
class ScheduledWork {
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Task $task
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Project\Task", fetch="EAGER")
     * @ORM\JoinColumn(name="task_id", referencedColumnName="id")
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
     * @return ScheduledWork
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
     * @return ScheduledWork
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
     * Set Task
     *
     * @param \App\Entity\Project\Task $task
     * @return ScheduledWork
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
}
