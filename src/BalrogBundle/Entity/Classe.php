<?php

namespace BalrogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classe
 */

 /** @ORM\MappedSuperclass */
 abstract class Classe
{
	protected $strength, $agility, $chance, $intelligence, $health, $image;

	abstract public function setCarac();

	abstract public function calculDamages();
}