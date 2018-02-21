<?php

namespace BalrogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Level
 *
 * @ORM\Table(name="level")
 * @ORM\Entity(repositoryClass="BalrogBundle\Repository\LevelRepository")
 */
class Level
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="difficulty", type="integer")
     */
    private $difficulty;


    /**
     * @ORM\OneToMany(targetEntity="Monster", mappedBy="level")
     */
    private $monsters;

    /**
     * @ORM\OneToMany(targetEntity="Round", mappedBy="level")
     */
    private $rounds;

    /**
     * @ORM\OneToMany(targetEntity="Equipment", mappedBy="level")
     */
    private $equipments;



    public function __construct()
    {
        $this->monsters = new ArrayCollection();
        $this->rounds = new ArrayCollection();
        $this->equipments = new ArrayCollection();
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

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Level
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * @param int $difficulty
     *
     * @return self
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getMonsters()
    {
        return $this->monsters;
    }

    /**
     * @param mixed $monsters
     *
     * @return self
     */
    public function setMonsters($monsters)
    {
        $this->monsters[] = $monsters;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRounds()
    {
        return $this->rounds;
    }

    /**
     * @param mixed $rounds
     *
     * @return self
     */
    public function setRounds($rounds)
    {
        $this->rounds[] = $rounds;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEquipments()
    {
        return $this->equipments;
    }

    /**
     * @param mixed $equipments
     *
     * @return self
     */
    public function setEquipments($equipments)
    {
        $this->equipments[] = $equipments;

        return $this;
    }
}
