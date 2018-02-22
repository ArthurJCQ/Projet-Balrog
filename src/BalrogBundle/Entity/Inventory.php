<?php

namespace BalrogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inventory
 *
 * @ORM\Table(name="inventory")
 * @ORM\Entity(repositoryClass="BalrogBundle\Repository\InventoryRepository")
 */
class Inventory
{

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Hero")
     * @ORM\JoinColumn(name="hero_id", referencedColumnName="id")
     *
     * @ORM\Id
     */
    private $heroId;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Equipment")
     * @ORM\JoinColumn(name="equip_id", referencedColumnName="id")
     *
     * @ORM\Id
     */
    private $equipId;


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
     * @return Inventory
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
     * @return Inventory
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
}
