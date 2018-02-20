<?php

namespace BalrogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Archer
*/
class Archer extends Classe
{
	public function setCarac()
	{
		$carac = [
			$strength => 4,
			$intelligence => 5,
			$chance => 6,
			$agility => 9,
		];

		return $carac;
	}
	
}