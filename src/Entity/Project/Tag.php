<?php

namespace AgencyDesk\DBBundle\Entity\Project;

use AgencyDesk\DBBundle\Entity\Relation\TaskDeveloper;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * AgencyDesk\DBBundle\Entity\Project\Tag
 *
 * @ORM\Table(name = "tag")
 * @ORM\Entity
 */
class Tag {
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var integer $kanbanOrder
     *
     * @ORM\Column(name="kanban_order", type="integer")
     */
    protected $kanbanOrder;

    /**
     * @var boolean $canStartOrStop
     *
     * @ORM\Column(name="can_start_or_stop", type="integer", nullable=true)
     */
    protected $canStartOrStop;

    /**
     * @var string $title
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $title;

    /**
     * @var string $style
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $style;

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
     * Set title
     *
     * @param string $title
     *
     * @return Tag
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
     * Set style
     *
     * @param string $style
     *
     * @return Tag
     */
    public function setStyle($style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Get style
     *
     * @return string
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Tag
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
     * @return Tag
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
     * Set order
     *
     * @param integer $order
     *
     * @return Tag
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return integer
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set kanbanOrder
     *
     * @param integer $kanbanOrder
     *
     * @return Tag
     */
    public function setKanbanOrder($kanbanOrder)
    {
        $this->kanbanOrder = $kanbanOrder;

        return $this;
    }

    /**
     * Get kanbanOrder
     *
     * @return integer
     */
    public function getKanbanOrder()
    {
        return $this->kanbanOrder;
    }

    /**
     * Set canStartOrStop
     *
     * @param integer $canStartOrStop
     *
     * @return Tag
     */
    public function setCanStartOrStop($canStartOrStop)
    {
        $this->canStartOrStop = $canStartOrStop;

        return $this;
    }

    /**
     * Get canStartOrStop
     *
     * @return integer
     */
    public function getCanStartOrStop()
    {
        return $this->canStartOrStop;
    }
}
