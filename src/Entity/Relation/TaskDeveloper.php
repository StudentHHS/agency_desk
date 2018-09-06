<?php

namespace AgencyDesk\DBBundle\Entity\Relation;

use Doctrine\ORM\Mapping as ORM;
use AgencyDesk\DBBundle\Entity\Project;
use AgencyDesk\DBBundle\Entity\User;
use Gedmo\Mapping\Annotation as Gedmo;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * AgencyDesk\DBBundle\Entity\Relation\TaskDeveloper
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
     * @ORM\ManyToOne(targetEntity="AgencyDesk\DBBundle\Entity\Project\Task", inversedBy="developers", cascade={"persist"})
     * @ORM\JoinColumn(name="task_id", referencedColumnName="id", onDelete="NO ACTION")
     */
    protected $task;

    /**
     * @var Developer $developer
     *
     * @ORM\ManyToOne(targetEntity="AgencyDesk\DBBundle\Entity\User\Developer", cascade={"persist"})
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
     * @param \AgencyDesk\DBBundle\Entity\Project\Task $task
     * @return TaskDeveloper
     */
    public function setTask(\AgencyDesk\DBBundle\Entity\Project\Task $task = null)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return \AgencyDesk\DBBundle\Entity\Project\Task
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Set developer
     *
     * @param \AgencyDesk\DBBundle\Entity\User\Developer $developer
     * @return TaskDeveloper
     */
    public function setDeveloper(\AgencyDesk\DBBundle\Entity\User\Developer $developer = null)
    {
        $this->developer = $developer;

        return $this;
    }

    /**
     * Add developer
     *
     * @param \AgencyDesk\DBBundle\Entity\User\Developer $developer
     * @return TaskDeveloper
     */
    public function addDeveloper(\AgencyDesk\DBBundle\Entity\User\Developer $developer = null)
    {
        $this->developer = $developer;

        return $this;
    }

    /**
     * Remove developers
     *
     * @param \AgencyDesk\DBBundle\Entity\Relation\TaskDeveloper $developers
     */
    public function removeDeveloper($developer)
    {
        $this->developers->removeElement($developer);
    }

    /**
     * Get developer
     *
     * @return \AgencyDesk\DBBundle\Entity\User\Developer
     */
    public function getDeveloper()
    {
        return $this->developer;
    }

    public function __toString() {
        return (string)$this->getDeveloper();
    }

}
