<?php
namespace App\Entity\Project;

use App\Entity\User\Developer;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * App\Entity\Project\DeveloperWork
 *
 * @ORM\Table(name = "developer_work")
 * @ORM\Entity
 */
class DeveloperWork {
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var ActualWork $ActualWork
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Project\ActualWork", fetch="EAGER")
     * @ORM\JoinColumn(name="actualwork_id", referencedColumnName="id")
     */
    protected $ActualWork;

    /**
     * @var Developer $Developer
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User\Developer", fetch="EAGER")
     * @ORM\JoinColumn(name="developer_id", referencedColumnName="id")
     */
    protected $Developer;

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
     * Set ActualWork
     *
     * @param \App\Entity\Project\ActualWork $actualWork
     * @return DeveloperWork
     */
    public function setActualWork(\App\Entity\Project\ActualWork $actualWork = null)
    {
        $this->ActualWork = $actualWork;

        return $this;
    }

    /**
     * Get ActualWork
     *
     * @return \App\Entity\Project\ActualWork
     */
    public function getActualWork()
    {
        return $this->ActualWork;
    }

    /**
     * Set Developer
     *
     * @param \App\Entity\User\Developer $developer
     * @return DeveloperWork
     */
    public function setDeveloper(\App\Entity\User\Developer $developer = null)
    {
        $this->Developer = $developer;

        return $this;
    }

    /**
     * Get Developer
     *
     * @return \App\Entity\User\Developer
     */
    public function getDeveloper()
    {
        return $this->Developer;
    }
}
