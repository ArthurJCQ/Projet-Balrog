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
    protected $name = "Character";

    /**
     * @ORM\ManyToOne(targetEntity="Round")
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

    /**
     * @return mixed
     */
    public function getRound()
    {
        return $this->Round;
    }

    /**
     * @param mixed $Round
     *
     * @return self
     */
    public function setRound($Round)
    {
        $this->Round = $Round;

        return $this;
    }

    /*public function __toString()
    {
        return $this->name;
    }*/
}
