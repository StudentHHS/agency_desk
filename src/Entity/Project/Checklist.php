<?php
namespace App\Entity\Project;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use \DateTime;


/**
 * App\Entity\Project\Checklist
 *
 * @ORM\Table(name = "checklist")
 * @ORM\Entity()
 */
class Checklist
{
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
     * @ORM\JoinColumn(name="task", referencedColumnName="id")
     */
    protected $task;

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
     * Set task
     *
     * @param \App\Entity\Project\Task $task
     *
     * @return Checklist
     */
    public function setTask(\App\Entity\Project\Task $task = null)
    {
        $this->task = $task;
    
        return $this;
    }

    /**
     * Get task
     *
     * @return \App\Entity\Project\Task
     */
    public function getTask()
    {
        return $this->task;
    }
}
