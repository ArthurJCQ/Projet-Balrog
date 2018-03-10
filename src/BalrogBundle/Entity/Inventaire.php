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
    private $heroId;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Equipment", inversedBy="inventories")
     * @ORM\JoinColumn(name="equip_id", referencedColumnName="id")
     */
    private $equipId;

    /**
     * @var bool
     *
     * @ORM\Column(name="equiped", type="boolean")
     */
    private $equiped;


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
     * Set heroId.
     *
     * @param int $heroId
     *
     * @return Inventaire
     */
    public function setHeroId($heroId)
    {
        $this->heroId = $heroId;

        return $this;
    }

    /**
     * Get heroId.
     *
     * @return int
     */
    public function getHeroId()
    {
        return $this->heroId;
    }

    /**
     * Set equipId.
     *
     * @param int $equipId
     *
     * @return Inventaire
     */
    public function setEquipId($equipId)
    {
        $this->equipId = $equipId;

        return $this;
    }

    /**
     * Get equipId.
     *
     * @return int
     */
    public function getEquipId()
    {
        return $this->equipId;
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
}
