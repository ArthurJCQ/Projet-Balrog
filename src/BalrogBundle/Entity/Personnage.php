<?php

namespace BalrogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personnage
 */

 /** @ORM\MappedSuperclass */
 abstract class Personnage
{

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="Round", inversedBy="personnages")
     * @ORM\JoinColumn(name="round_id", referencedColumnName="id")
     */
    protected $Round;


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
     * @return Personnage
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
}
