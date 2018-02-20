<?php

namespace BalrogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Guerrier
*/
class Guerrier extends Classe
{
	public function setCarac()
	{
		$carac = [
			$strength => 9,
			$intelligence => 6,
			$chance => 5,
			$agility => 4,
		];

		return $carac;
	}
	
}