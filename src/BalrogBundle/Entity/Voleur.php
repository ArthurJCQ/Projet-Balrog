<?php

namespace BalrogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Voleur
*/
class Voleur extends Classe
{
	public function setCarac()
	{
		$carac = [
			$strength => 4,
			$intelligence => 6,
			$chance => 5,
			$agility => 9,
		];

		return $carac;
	}
	
}