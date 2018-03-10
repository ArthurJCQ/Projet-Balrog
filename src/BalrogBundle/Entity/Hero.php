<?php

namespace BalrogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Application\Sonata\UserBundle\Entity\User as User;

/**
 * Hero
 *
 * @ORM\Table(name="hero")
 * @ORM\Entity(repositoryClass="BalrogBundle\Repository\HeroRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Hero extends Personnage
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
     * @ORM\Column(name="heroClass", type="string", length=255)
     */
    private $classe;


    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;  

    /**
     * @var int
     *
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

    /**
     * @var Inventaire Collection
     * 
     * @ORM\OneToMany(targetEntity="Inventaire", mappedBy="heroId")
     */
    private $inventories;

    /**
     * @var int
     *
     * @ORM\Column(name="health", type="integer")
     */
    private $health;

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
     * @var int
     *
     * @ORM\Column(name="damages", type="integer")
     */
    private $damages;

    /**
     * @var string
     * 
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    public function __construct()
    {
        $this->inventories = new ArrayCollection();
        $this->equipments = new ArrayCollection();
    }

    /**
     * Crée la classe du héro instancié
     * @param [string] $classe [classe du personnage]
     * @ORM\PrePersist
     */
    public function setClass()
    {
        $classeArray = [
            'Guerrier' => new Guerrier,
            'Archer' => new Archer,
            'Mage' => new Mage,
            'Voleur' => new Voleur
        ];

        $heroClasse = $classeArray[$this->classe];

        $carac = $heroClasse->setCarac();

        // dump($carac);die();

        $calcDam = $heroClasse->calculDamages();

        $this->strength = $carac['strength'];
        $this->intelligence = $carac['intelligence'];
        $this->chance = $carac['chance'];
        $this->agility = $carac['agility'];
        $this->health = $carac['health'];
        $this->image = $carac['image'];
        $this->level = 1;
        $this->damages = $calcDam;
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
     * Set level.
     *
     * @param int $level
     *
     * @return Hero
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level.
     *
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set health.
     *
     * @param int $health
     *
     * @return Hero
     */
    public function setHealth($health)
    {
        $this->health = $health;

        return $this;
    }

    /**
     * Get health.
     *
     * @return int
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * Set strength.
     *
     * @param int $strength
     *
     * @return Hero
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
     * @return Hero
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
     * @return Hero
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
     * @return Hero
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
     * Set damages.
     *
     * @param int $damages
     *
     * @return Hero
     */
    public function setDamages($damages)
    {
        $this->damages = $damages;

        return $this;
    }

    /**
     * Get damages.
     *
     * @return int
     */
    public function getDamages()
    {
        return $this->damages;
    }

    /*public function __toString()
    {
        parent::__toString();
    }*/

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     *
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * @param string $classe
     *
     * @return self
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Set image.
     *
     * @param string $image
     *
     * @return Hero
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add equipment.
     *
     * @param \BalrogBundle\Entity\Equipment $equipment
     *
     * @return Hero
     */
    public function addEquipment(\BalrogBundle\Entity\Equipment $equipment)
    {
        $this->equipments[] = $equipment;

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

    /**
     * Get equipments.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEquipments()
    {
        return $this->equipments;
    }

    /**
     * Add inventory.
     *
     * @param \BalrogBundle\Entity\Inventaire $inventory
     *
     * @return Hero
     */
    public function addInventory(\BalrogBundle\Entity\Inventaire $inventory)
    {
        $this->inventories[] = $inventory;

        return $this;
    }

    /**
     * Remove inventory.
     *
     * @param \BalrogBundle\Entity\Inventaire $inventory
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeInventory(\BalrogBundle\Entity\Inventaire $inventory)
    {
        return $this->inventories->removeElement($inventory);
    }

    /**
     * Get inventories.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInventories()
    {
        return $this->inventories;
    }
}
