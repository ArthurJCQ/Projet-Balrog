<?php

namespace BalrogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Mage
*/
class Mage extends Classe
{
	protected $strength = 4, $agility = 5, $chance = 6, $intelligence = 9, $health = 30, $image = "mage.png";

	public function setCarac()
	{
		$carac = [
			'strength' => $this->strength,
			'intelligence' => $this->intelligence,
			'chance' => $this->chance,
			'agility' => $this->agility,
			'health' => $this->health,
			'image' => $this->image
		];

		return $carac;
	}

	public function calculDamages()
	{
		return 20;
	}
	
}