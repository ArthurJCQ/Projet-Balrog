<?php

namespace BalrogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Monster
 *
 * @ORM\Table(name="monster")
 * @ORM\Entity(repositoryClass="BalrogBundle\Repository\MonsterRepository")
 */
class Monster extends Personnage
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
     * @ORM\Column(name="damages", type="integer")
     */
    private $damages;

    /**
     * @var int
     *
     * @ORM\Column(name="health", type="integer")
     */
    private $health;

    /**
     * @ORM\ManyToOne(targetEntity="Level", inversedBy="monsters")
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
     * Set damages.
     *
     * @param int $damages
     *
     * @return Monster
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

    /**
     * Set health.
     *
     * @param int $health
     *
     * @return Monster
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
}
