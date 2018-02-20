<?php

namespace BalrogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classe
 */

 /** @ORM\MappedSuperclass */
 abstract class Classe
{

	abstract protected function setCarac();

}