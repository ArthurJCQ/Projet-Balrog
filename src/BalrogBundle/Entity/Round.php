<?php

namespace BalrogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @ORM\OneToMany(targetEntity="Personnage", mappedBy="round")
     */
    private $personnages;

    /**
     * @ORM\ManyToOne(targetEntity="Level", inversedBy="rounds")
     * @ORM\JoinColumn(name="level_id", referencedColumnName="id")
     */
    private $level;



    public function __construct()
    {
        $this->personnages = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
