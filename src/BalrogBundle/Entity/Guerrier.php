<?php

namespace BalrogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Guerrier
*/
class Guerrier extends Classe
{
	protected $strength = 9, $agility = 4, $chance = 5, $intelligence = 6, $health = 50, $image = "guerrier.png";

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