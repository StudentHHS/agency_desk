<?php

namespace App\Entity\Project;

use App\Entity\User\Developer;
use App\Entity\Project\Project;
use App\Entity\Project\Task;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * AgencyDesk\DBBundle\Entity\Project\Commit
 *
 * @ORM\Table(name = "commit")
 * @ORM\Entity
 */
class Commit
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
     * @var string $hash
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $hash;

    /**
     * @var string $message
     *
     * @ORM\Column(type="text", nullable=false)
     */
    protected $message;

    /**
     * @var string $service
     *
     * @ORM\Column(type="text", nullable=false)
     */
    protected $service;

    /**
     * @var datetime $timestamp
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $timestamp;

    /**
     * @var Developer $project
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User\Developer", fetch="EAGER")
     * @ORM\JoinColumn(name="developer", referencedColumnName="id", nullable=true)
     */
    protected $developer;

    /**
     * @var string $author
     *
     * @ORM\Column(type="text", nullable=false)
     */
    protected $author;

    /**
     * @var Task $task
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Project\Task", fetch="EAGER")
     * @ORM\JoinColumn(name="task", referencedColumnName="id", nullable=true)
     */
    protected $task;

    /**
     * @var Project $project
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Project\Project", fetch="EAGER")
     * @ORM\JoinColumn(name="project", referencedColumnName="id", nullable=true)
     */
    protected $project;

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
        $this->developer = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set hash
     *
     * @param string $hash
     *
     * @return Commit
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Get hash
     *
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Commit
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set timestamp
     *
     * @param \DateTime $timestamp
     *
     * @return Commit
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Commit
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
     * @return Commit
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
     * Add developer
     *
     * @param \App\Entity\User\Developer $developer
     *
     * @return Commit
     */
    public function addDeveloper(\App\Entity\User\Developer $developer)
    {
        $this->developer[] = $developer;

        return $this;
    }

    /**
     * Remove developer
     *
     * @param \App\Entity\User\Developer $developer
     */
    public function removeDeveloper(\App\Entity\User\Developer $developer)
    {
        $this->developer->removeElement($developer);
    }

    /**
     * Get developer
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDeveloper()
    {
        return $this->developer;
    }

    /**
     * Set project
     *
     * @param \App\Entity\Project\Project $project
     *
     * @return Commit
     */
    public function setProject(\App\Entity\Project\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \App\Entity\Project\Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set developer
     *
     * @param \App\Entity\User\Developer $developer
     *
     * @return Commit
     */
    public function setDeveloper(\App\Entity\User\Developer $developer = null)
    {
        $this->developer = $developer;

        return $this;
    }

    /**
     * Set task
     *
     * @param \App\Entity\Project\Task $task
     *
     * @return Commit
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
     * Set service
     *
     * @param string $service
     *
     * @return Commit
     */
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Commit
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
