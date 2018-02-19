<?php

namespace BalrogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application\Sonata\UserBundle\Entity\User as User;

/**
 * Hero
 *
 * @ORM\Table(name="hero")
 * @ORM\Entity(repositoryClass="BalrogBundle\Repository\HeroRepository")
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
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="heros")
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
}
