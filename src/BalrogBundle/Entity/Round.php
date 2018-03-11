<?php

namespace BalrogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Round
 *
 * @ORM\Table(name="round")
 * @ORM\Entity(repositoryClass="BalrogBundle\Repository\RoundRepository")
 */
class Round
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity="Level", inversedBy="rounds")
     * @ORM\JoinColumn(name="level_id", referencedColumnName="id")
     */
    private $level;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set level.
     *
     * @param \BalrogBundle\Entity\Level|null $level
     *
     * @return Round
     */
    public function setLevel(\BalrogBundle\Entity\Level $level = null)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level.
     *
     * @return \BalrogBundle\Entity\Level|null
     */
    public function getLevel()
    {
        return $this->level;
    }
}
