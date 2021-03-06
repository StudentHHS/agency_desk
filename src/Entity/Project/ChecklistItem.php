<?php
namespace App\Entity\Project;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use \DateTime;


/**
 * App\Entity\Project\ChecklistItem
 *
 * @ORM\Table(name = "checklist_item")
 * @ORM\Entity()
 */
class ChecklistItem
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
     * @var Checklist $checklist
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Project\Checklist", fetch="EAGER")
     * @ORM\JoinColumn(name="checklist", referencedColumnName="id")
     */
    protected $checklist;

    /**
     * @var string $title
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $title;

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
     * Set checklist
     *
     * @param \App\Entity\Project\Checklist $checklist
     *
     * @return ChecklistItem
     */
    public function setChecklist(\App\Entity\Project\Checklist $checklist = null)
    {
        $this->checklist = $checklist;

        return $this;
    }

    /**
     * Get checklist
     *
     * @return \App\Entity\Project\Checklist
     */
    public function getChecklist()
    {
        return $this->checklist;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return ChecklistItem
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
}
