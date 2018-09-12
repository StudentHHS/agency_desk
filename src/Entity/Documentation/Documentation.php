<?php

namespace App\Entity\Documentation;

use App\Entity\User\Developer;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Documentation
 *
 * @ORM\Table(name="documentation")
 * @ORM\Entity
 */
class Documentation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $title
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $title;

    /**
     * @var boolean $active
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    protected $active = true;

    /**
     * @var string $description
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @var string $markdown
     * @ORM\Column(type="text")
     */
    private $markdown;

    /**
     * @var Developer $developer
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User\Developer", inversedBy="Documentation")
     * @ORM\JoinColumn(name="developer_id", referencedColumnName="id", nullable=false)
     */
    protected $developer;

    /**
     * @var Developer $subject
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Documentation\Subject", inversedBy="Documentation")
     * @ORM\JoinColumn(name="subject_id", referencedColumnName="id", nullable=false)
     */
    protected $subject;

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
     * @return Contract
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
     * @return Contract
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
     * Set name
     *
     * @param string $name
     *
     * @return Documentation
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Documentation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createdBy
     *
     * @param \App\Entity\User\Developer $createdBy
     *
     * @return Documentation
     */
    public function setCreatedBy(\App\Entity\User\Developer $createdBy = null)
    {
        $this->created_by = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \App\Entity\User\Developer
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Set markdown
     *
     * @param string $markdown
     *
     * @return Documentation
     */
    public function setMarkdown($markdown)
    {
        $this->markdown = $markdown;

        return $this;
    }

    /**
     * Get markdown
     *
     * @return string
     */
    public function getMarkdown()
    {
        return $this->markdown;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Documentation
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
     * Set developer
     *
     * @param \App\Entity\User\Developer $developer
     *
     * @return Documentation
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
     * Set subject
     *
     * @param \App\Entity\Documentation\Subject $subject
     *
     * @return Documentation
     */
    public function setSubject(\App\Entity\Documentation\Subject $subject = null)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return \App\Entity\Documentation\Subject
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Documentation
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }
}
