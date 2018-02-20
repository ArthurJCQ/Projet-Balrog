<?php

namespace BalrogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Mage
*/
class Mage extends Classe
{
	public function setCarac()
	{
		$carac = [
			$strength => 4,
			$intelligence => 9,
			$chance => 6,
			$agility => 5,
		];

		return $carac;
	}
	
}