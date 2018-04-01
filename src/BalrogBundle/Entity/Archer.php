<?php

namespace BalrogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Archer
*/
class Archer extends Classe
{
	protected $strength = 4, $agility = 9, $chance = 5, $intelligence = 6, $health = 100, $image = "archer.png";

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