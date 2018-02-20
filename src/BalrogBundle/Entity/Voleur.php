<?php

namespace BalrogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Voleur
*/
class Voleur extends Classe
{
	protected $strength = 4, $agility = 9, $chance = 5, $intelligence = 6, $health = 40;

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