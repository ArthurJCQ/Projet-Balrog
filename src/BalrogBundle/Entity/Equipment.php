<?php

namespace BalrogBundle\Entity;

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
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="rareness", type="string", length=255)
     */
    protected $rareness;

    /**
     * @ORM\ManyToOne(targetEntity="Level", inversedBy="equipments")
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
}
