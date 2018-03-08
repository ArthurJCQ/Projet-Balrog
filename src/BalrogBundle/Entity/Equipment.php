<?php

namespace BalrogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Equipment
 *
 * @ORM\Table(name="equipment")
 * @ORM\Entity(repositoryClass="BalrogBundle\Repository\EquipmentRepository")
 */
class Equipment
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
    protected $name = "Equipement";

    /**
     * @var string
     *
     * @ORM\Column(name="rareness", type="string", length=255)
     */
    protected $rareness;

    /**
     * @var int
     *
     * @ORM\Column(name="strength", type="integer")
     */
    private $strength;

    /**
     * @var int
     *
     * @ORM\Column(name="agility", type="integer")
     */
    private $agility;

    /**
     * @var int
     *
     * @ORM\Column(name="intelligence", type="integer")
     */
    private $intelligence;

    /**
     * @var int
     *
     * @ORM\Column(name="chance", type="integer")
     */
    private $chance;

    /**
     * @ORM\ManyToOne(targetEntity="Level", inversedBy="equipments")
     * @ORM\JoinColumn(name="level_id", referencedColumnName="id")
     */
    private $level;

    /**
     * @ORM\ManyToMany(targetEntity="Hero", mappedBy="equipments")
     */
    private $heros;


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
     * @return Equipment
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
     * Set rareness.
     *
     * @param string $rareness
     *
     * @return Equipment
     */
    public function setRareness($rareness)
    {
        $this->rareness = $rareness;

        return $this;
    }

    /**
     * Get rareness.
     *
     * @return string
     */
    public function getRareness()
    {
        return $this->rareness;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     *
     * @return self
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Set strength.
     *
     * @param int $strength
     *
     * @return Equipment
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * Get strength.
     *
     * @return int
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set agility.
     *
     * @param int $agility
     *
     * @return Equipment
     */
    public function setAgility($agility)
    {
        $this->agility = $agility;

        return $this;
    }

    /**
     * Get agility.
     *
     * @return int
     */
    public function getAgility()
    {
        return $this->agility;
    }

    /**
     * Set intelligence.
     *
     * @param int $intelligence
     *
     * @return Equipment
     */
    public function setIntelligence($intelligence)
    {
        $this->intelligence = $intelligence;

        return $this;
    }

    /**
     * Get intelligence.
     *
     * @return int
     */
    public function getIntelligence()
    {
        return $this->intelligence;
    }

    /**
     * Set chance.
     *
     * @param int $chance
     *
     * @return Equipment
     */
    public function setChance($chance)
    {
        $this->chance = $chance;

        return $this;
    }

    /**
     * Get chance.
     *
     * @return int
     */
    public function getChance()
    {
        return $this->chance;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->heros = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add hero.
     *
     * @param \BalrogBundle\Entity\Hero $hero
     *
     * @return Equipment
     */
    public function addHero(\BalrogBundle\Entity\Hero $hero)
    {
        $this->heros[] = $hero;

        return $this;
    }

    /**
     * Remove hero.
     *
     * @param \BalrogBundle\Entity\Hero $hero
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeHero(\BalrogBundle\Entity\Hero $hero)
    {
        return $this->heros->removeElement($hero);
    }

    /**
     * Get heros.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHeros()
    {
        return $this->heros;
    }
}
