<?php

namespace AgencyDesk\DBBundle\Entity\Project;

use AgencyDesk\DBBundle\Entity\Relation\TaskDeveloper;
use AgencyDesk\DBBundle\Entity\Project\Tag;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * AgencyDesk\DBBundle\Entity\Project\Task
 *
 * @ORM\Table(name = "task")
 * @ORM\Entity(repositoryClass="Gedmo\Sortable\Entity\Repository\SortableRepository")
 */
class Task
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
     * @var integer $priority
     *
     * @ORM\Column(name="priority", type="integer")
     */
    protected $priority;

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
     * @var time $estimated_time
     *
     * @Gedmo\Versioned
     * @ORM\Column(name="estimated_time", type="time", nullable=true)
     */
    protected $estimated_time;

    /**
     * @var datetime $approved_date
     *
     * @Gedmo\Versioned
     * @ORM\Column(name="approved_date", type="datetime", nullable=true)
     */
    protected $approved_date;

    /**
     * @var datetime $finished_date
     *
     * @Gedmo\Versioned
     * @ORM\Column(name="finished_date", type="datetime", nullable=true)
     */
    protected $finished_date;

    /**
     * @var boolean $approved
     *
     * @ORM\Column(name="approved", type="boolean", nullable=true )
     */
    protected $approved = false;

    /**
     * @var Tag $tag
     *
     * @Gedmo\SortableGroup
     * @ORM\ManyToOne(targetEntity="AgencyDesk\DBBundle\Entity\Project\Tag", fetch="EAGER")
     * @ORM\JoinColumn(name="tag_id", referencedColumnName="id", nullable=true)
     */
    protected $tag;

    /**
     * @var integer $position
     *
     * @Gedmo\SortablePosition
     * @ORM\Column(name="position", type="integer", nullable=false)
     */
    protected $position;

    /**
     * @var integer $vivifyId
     *
     * @ORM\Column(name="vivify_id", type="integer", nullable=true, unique=true)
     */
    protected $vivifyId;

    /**
     * @ORM\OneToMany(targetEntity="AgencyDesk\DBBundle\Entity\Relation\TaskDeveloper", mappedBy="task", cascade={"persist","remove"})
     */
    protected $td;
    private $developers;

    /**
     * @ORM\OneToMany(targetEntity="AgencyDesk\DBBundle\Entity\Relation\TaskDeveloper", mappedBy="task", cascade={"persist","remove"})
     */
    protected $tr;
    private $reviewers;

    /**
     * @var Project $project
     *
     * @ORM\ManyToOne(targetEntity="AgencyDesk\DBBundle\Entity\Project\Project", fetch="EAGER")
     * @ORM\JoinColumn(name="project", referencedColumnName="id")
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
        $this->developers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->td = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tr = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get developers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTd()
    {
        return $this->td;
    }

    /**
     * Add developers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function addTd(TaskDeveloper $developer)
    {
        $this->td[] = $developer;

        return $this;
    }

    /**
     * Add developers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function addTr(TaskDeveloper $developer)
    {
        $this->tr[] = $developer;

        return $this;
    }



    public function getReviewers() {
        $reviewers = new ArrayCollection();

        foreach($this->tr as $reviewer)
        {
            $reviewers[] = $reviewer->getDeveloper();
        }

        return $reviewers;
    }

    public function setReviewers($reviewers) {
        foreach($reviewers as $reviewer)
        {
            $bExisting=false;
            $taskDeveloper = new TaskDeveloper();

            $taskDeveloper->setDeveloper($reviewer);
            $taskDeveloper->setTask($this);

            foreach($this->getTd() as $oTr) {
                if(method_exists($oTr, 'getReviewers') === false)
                    continue;

                if($oTr->getReviewers()->getId() == $reviewer->getId())
                    $bExisting=true;
            }

            if($bExisting == false)
                $this->addTd($taskDeveloper);
        }
    }

    /**
     * Remove reviewers
     *
     * @param \AgencyDesk\DBBundle\Entity\Relation\TaskDeveloper $developers
     */
    public function removeReviewer(\AgencyDesk\DBBundle\Entity\Relation\TaskDeveloper $developers)
    {
        $this->developers->removeElement($developers);
    }


    public function getDevelopers() {
        $developers = new ArrayCollection();

        foreach($this->td as $developer)
        {
            $developers[] = $developer->getDeveloper();
        }

        return $developers;
    }

    public function setDevelopers($developers) {
        foreach($developers as $developer)
        {
            $bExisting=false;
            $taskDeveloper = new TaskDeveloper();

            $taskDeveloper->setDeveloper($developer);
            $taskDeveloper->setTask($this);

            foreach($this->getTd() as $oTd) {
                if(method_exists($oTd, 'getDevelopers') === false)
                    continue;

                if($oTd->getDevelopers()->getId() == $developer->getId())
                    $bExisting=true;
            }

            if($bExisting == false)
                $this->addTd($taskDeveloper);
        }
    }

    /**
     * Remove developers
     *
     * @param \AgencyDesk\DBBundle\Entity\Relation\TaskDeveloper $developers
     */
    public function removeDeveloper(\AgencyDesk\DBBundle\Entity\Relation\TaskDeveloper $developers)
    {
        $this->developers->removeElement($developers);
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
     * Set priority
     *
     * @param integer $priority
     *
     * @return Task
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Task
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
     *
     * @return Task
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
     * Set estimatedTime
     *
     * @param \DateTime $estimatedTime
     *
     * @return Task
     */
    public function setEstimatedTime($estimatedTime)
    {
        $this->estimated_time = $estimatedTime;

        return $this;
    }

    /**
     * Get estimatedTime
     *
     * @return \DateTime
     */
    public function getEstimatedTime()
    {
        return $this->estimated_time;
    }

    /**
     * Set approvedDate
     *
     * @param \DateTime $approvedDate
     *
     * @return Task
     */
    public function setApprovedDate($approvedDate)
    {
        $this->approved_date = $approvedDate;

        return $this;
    }

    /**
     * Get approvedDate
     *
     * @return \DateTime
     */
    public function getApprovedDate()
    {
        return $this->approved_date;
    }

    /**
     * Set finishedDate
     *
     * @param \DateTime $finishedDate
     *
     * @return Task
     */
    public function setFinishedDate($finishedDate)
    {
        $this->finished_date = $finishedDate;

        return $this;
    }

    /**
     * Get finishedDate
     *
     * @return \DateTime
     */
    public function getFinishedDate()
    {
        return $this->finished_date;
    }

    /**
     * Set approved
     *
     * @param boolean $approved
     *
     * @return Task
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;

        return $this;
    }

    /**
     * Get approved
     *
     * @return boolean
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return Task
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set vivifyId
     *
     * @param integer $vivifyId
     *
     * @return Task
     */
    public function setVivifyId($vivifyId)
    {
        $this->vivifyId = $vivifyId;

        return $this;
    }

    /**
     * Get vivifyId
     *
     * @return integer
     */
    public function getVivifyId()
    {
        return $this->vivifyId;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Task
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
     * @return Task
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
     * Set tag
     *
     * @param \AgencyDesk\DBBundle\Entity\Project\Tag $tag
     *
     * @return Task
     */
    public function setTag(\AgencyDesk\DBBundle\Entity\Project\Tag $tag = null)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return \AgencyDesk\DBBundle\Entity\Project\Tag
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Remove td
     *
     * @param \AgencyDesk\DBBundle\Entity\Relation\TaskDeveloper $td
     */
    public function removeTd(\AgencyDesk\DBBundle\Entity\Relation\TaskDeveloper $td)
    {
        $this->td->removeElement($td);
    }

    /**
     * Set project
     *
     * @param \AgencyDesk\DBBundle\Entity\Project\Project $project
     *
     * @return Task
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
     * Remove tr
     *
     * @param \AgencyDesk\DBBundle\Entity\Relation\TaskDeveloper $tr
     */
    public function removeTr(\AgencyDesk\DBBundle\Entity\Relation\TaskDeveloper $tr)
    {
        $this->tr->removeElement($tr);
    }

    /**
     * Get tr
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTr()
    {
        return $this->tr;
    }
}
