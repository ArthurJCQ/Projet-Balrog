<?php

namespace BalrogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Level
 *
 * @ORM\Table(name="level")
 * @ORM\Entity(repositoryClass="BalrogBundle\Repository\LevelRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @ORM\OneToMany(targetEntity="Monster", mappedBy="level", cascade={"all"})
     */
    private $monsters;

    /**
     * @ORM\OneToMany(targetEntity="Round", mappedBy="level")
     */
    private $rounds;

    /**
     * @ORM\OneToMany(targetEntity="Equipment", mappedBy="level", cascade={"all"})
     */
    private $equipments;



    public function __construct()
    {
        $this->monsters = new ArrayCollection();
        $this->rounds = new ArrayCollection();
        $this->equipments = new ArrayCollection();
    }

    /**
     * @ORM\PostUpdate
     */
    public function updateLevel($level)
    {
        //dump($level);die();
        //$this->preUpdate($level);
    }

    /**
     * 
     */
    public function preUpdate($level)
    {
        //$level->setEquipments($level->getEquipments());
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
    public function setMonsters(\BalrogBundle\Entity\Monster $monsters)
    {
        dump($monster);die();
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
    public function setRounds(\BalrogBundle\Entity\Round $rounds)
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
    public function setEquipments(\BalrogBundle\Entity\Equipment $equipments)
    {
        dump($equipment);die();

        $this->equipments[] = $equipments;

        return $this;
    }

    /**
     * Add monster.
     *
     * @param \BalrogBundle\Entity\Monster $monster
     *
     * @return Level
     */
    public function addMonster(\BalrogBundle\Entity\Monster $monster)
    {
        dump($monster);die();
        $this->monsters[] = $monster;
        $monster->setLevel($this);

        return $this;
    }

    /**
     * Remove monster.
     *
     * @param \BalrogBundle\Entity\Monster $monster
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeMonster(\BalrogBundle\Entity\Monster $monster)
    {
        return $this->monsters->removeElement($monster);
    }

    /**
     * Add round.
     *
     * @param \BalrogBundle\Entity\Round $round
     *
     * @return Level
     */
    public function addRound(\BalrogBundle\Entity\Round $round)
    {
        $this->rounds[] = $round;

        return $this;
    }

    /**
     * Remove round.
     *
     * @param \BalrogBundle\Entity\Round $round
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeRound(\BalrogBundle\Entity\Round $round)
    {
        return $this->rounds->removeElement($round);
    }

    /**
     * Add equipment.
     *
     * @param \BalrogBundle\Entity\Equipment $equipment
     *
     * @return Level
     */
    public function addEquipment(\BalrogBundle\Entity\Equipment $equipment)
    {
        dump($equipment);die();
        $this->equipments[] = $equipment;
        $equipment->setLevel($this);

        return $this;
    }

    /**
     * Remove equipment.
     *
     * @param \BalrogBundle\Entity\Equipment $equipment
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeEquipment(\BalrogBundle\Entity\Equipment $equipment)
    {
        return $this->equipments->removeElement($equipment);
    }

}
