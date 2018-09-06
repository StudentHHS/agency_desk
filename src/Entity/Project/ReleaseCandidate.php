<?php

namespace AgencyDesk\DBBundle\Entity\Project;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * AgencyDesk\DBBundle\Entity\Project\ReleaseCandidate
 *
 * @ORM\Table(name = "release_candidate")
 * @ORM\Entity
 */
class ReleaseCandidate {
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Project $project
     *
     * @ORM\ManyToOne(targetEntity="AgencyDesk\DBBundle\Entity\Project\Project", fetch="EAGER", inversedBy="releaseCandidates")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    protected $project;

    /**
     * @var string $title
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $title;

    /**
     * @var string $body
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $body;

    /**
     * @var datetime $scheduled_release_date
     *
     * @Gedmo\Versioned
     * @ORM\Column(name="scheduled_release_date", type="datetime", nullable=true)
     */
    protected $scheduled_release_date;

    /**
     * @var datetime $actual_release_date
     *
     * @Gedmo\Versioned
     * @ORM\Column(name="actual_release_date", type="datetime", nullable=true)
     */
    protected $actual_release_date;

    /**
     * @ORM\OneToMany(targetEntity="\AgencyDesk\DBBundle\Entity\Project\Task", mappedBy="releaseCandidate", cascade={"persist"})
     * @var \Doctrine\Common\Collections\Collection $tasks
     */
    protected $tasks;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tasks = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return ReleaseCandidate
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return ReleaseCandidate
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set scheduled_release_date
     *
     * @param \DateTime $scheduledReleaseDate
     * @return ReleaseCandidate
     */
    public function setScheduledReleaseDate($scheduledReleaseDate)
    {
        $this->scheduled_release_date = $scheduledReleaseDate;

        return $this;
    }

    /**
     * Get scheduled_release_date
     *
     * @return \DateTime
     */
    public function getScheduledReleaseDate()
    {
        return $this->scheduled_release_date;
    }

    /**
     * Set actual_release_date
     *
     * @param \DateTime $actualReleaseDate
     * @return ReleaseCandidate
     */
    public function setActualReleaseDate($actualReleaseDate)
    {
        $this->actual_release_date = $actualReleaseDate;

        return $this;
    }

    /**
     * Get actual_release_date
     *
     * @return \DateTime
     */
    public function getActualReleaseDate()
    {
        return $this->actual_release_date;
    }

    /**
     * Set project
     *
     * @param \AgencyDesk\DBBundle\Entity\Project\Project $project
     * @return ReleaseCandidate
     */
    public function setProject(\AgencyDesk\DBBundle\Entity\Project\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \AgencyDesk\DBBundle\Entity\Project\Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Add tasks
     *
     * @param \AgencyDesk\DBBundle\Entity\Project\Task $tasks
     * @return ReleaseCandidate
     */
    public function addTask(\AgencyDesk\DBBundle\Entity\Project\Task $tasks)
    {
        $this->taskss[] = $taskss;

        return $this;
    }

    /**
     * Remove tasks
     *
     * @param \AgencyDesk\DBBundle\Entity\Project\Task $tasks
     */
    public function removeTask(\AgencyDesk\DBBundle\Entity\Project\Task $tasks)
    {
        $this->taskss->removeElement($tasks);
    }

    /**
     * Get tasks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTasks()
    {
        return $this->tasks;
    }
}
