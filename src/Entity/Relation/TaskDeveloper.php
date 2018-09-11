<?php

namespace App\Entity\Relation;

use App\Entity\Project\Task;
use App\Entity\User\Developer;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Project;
use App\Entity\User;
use Gedmo\Mapping\Annotation as Gedmo;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * App\Entity\Relation\TaskDeveloper
 *
 * @ORM\Table(name="link__task__developer")
 * @ORM\Entity()
 */
class TaskDeveloper
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Task $task
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Project\Task", inversedBy="developers", cascade={"persist"})
     * @ORM\JoinColumn(name="task_id", referencedColumnName="id", onDelete="NO ACTION")
     */
    protected $task;

    /**
     * @var Developer $developer
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User\Developer", cascade={"persist"})
     * @ORM\JoinColumn(name="developer_id", referencedColumnName="id", onDelete="NO ACTION")
     */
    protected $developer;

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
     * @return TaskDeveloper
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
     * @return TaskDeveloper
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
     * Set task
     *
     * @param \App\Entity\Project\Task $task
     * @return TaskDeveloper
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

    /**
     * Set developer
     *
     * @param \App\Entity\User\Developer $developer
     * @return TaskDeveloper
     */
    public function setDeveloper(\App\Entity\User\Developer $developer = null)
    {
        $this->developer = $developer;

        return $this;
    }

    /**
     * Add developer
     *
     * @param \App\Entity\User\Developer $developer
     * @return TaskDeveloper
     */
    public function addDeveloper(\App\Entity\User\Developer $developer = null)
    {
        $this->developer = $developer;

        return $this;
    }

    /**
     * Remove developers
     *
     * @param \App\Entity\Relation\TaskDeveloper $developers
     */
    public function removeDeveloper($developer)
    {
        $this->developers->removeElement($developer);
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

    public function __toString() {
        return (string)$this->getDeveloper();
    }

}
