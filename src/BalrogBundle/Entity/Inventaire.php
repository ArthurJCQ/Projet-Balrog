<?php

namespace BalrogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inventaire
 *
 * @ORM\Table(name="inventaire")
 * @ORM\Entity(repositoryClass="BalrogBundle\Repository\InventaireRepository")
 */
class Inventaire
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
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Hero", inversedBy="inventories")
     * @ORM\JoinColumn(name="hero_id", referencedColumnName="id")
     */
    private $hero;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Equipment", inversedBy="inventories")
     * @ORM\JoinColumn(name="equip_id", referencedColumnName="id")
     */
    private $equipment = "";

    /**
     * @var bool
     *
     * @ORM\Column(name="equiped", type="boolean")
     */
    private $equiped = false;



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
     * Set equiped.
     *
     * @param bool $equiped
     *
     * @return Inventaire
     */
    public function setEquiped($equiped)
    {
        $this->equiped = $equiped;

        return $this;
    }

    /**
     * Get equiped.
     *
     * @return bool
     */
    public function getEquiped()
    {
        return $this->equiped;
    }

    /**
     * Set hero.
     *
     * @param \BalrogBundle\Entity\Hero|null $hero
     *
     * @return Inventaire
     */
    public function setHero(\BalrogBundle\Entity\Hero $hero = null)
    {
        $this->hero = $hero;

        return $this;
    }

    /**
     * Get hero.
     *
     * @return \BalrogBundle\Entity\Hero|null
     */
    public function getHero()
    {
        return $this->hero;
    }

    /**
     * Set equipment.
     *
     * @param \BalrogBundle\Entity\Equipment|null $equipment
     *
     * @return Inventaire
     */
    public function setEquipment(\BalrogBundle\Entity\Equipment $equipment = null)
    {
        $this->equipment = $equipment;

        return $this;
    }

    /**
     * Get equipment.
     *
     * @return \BalrogBundle\Entity\Equipment|null
     */
    public function getEquipment()
    {
        return $this->equipment;
    }


    public function __toString()
    {
        if ($this->equipment === "") {
            return $this->equipment;
        }
        return $this->equipment->getName();
    }
}
