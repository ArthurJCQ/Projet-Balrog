<?php

namespace BalrogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Voleur
*/
class Voleur extends Classe
{
	protected $strength = 6, $agility = 9, $chance = 4, $intelligence = 5, $health = 40;

	public function setCarac()
	{
		$carac = [
			'strength' => $this->strength,
			'intelligence' => $this->intelligence,
			'chance' => $this->chance,
			'agility' => $this->agility,
			'health' => $this->health
		];

		return $carac;
	}

	public function calculDamages()
	{
		return 20 + $this->agility;
	}
	
}