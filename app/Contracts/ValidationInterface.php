<?php

namespace App\Contracts;

/**
 *
 * @author Yuri
 */
interface ValidationInterface 
{
   public function validate(array $data, array $rules);
   public function fails();
}
