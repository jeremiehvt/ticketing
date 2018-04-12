<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class DateCounter extends Constraint
{
    /*
     * Any public properties become valid options for the annotation.
     * Then, use these in your validator class.
     */
    public $message = 'Ils n\'y a plus de place disponible pour le : "{{ value }}" veuillez choisir une autre date.';

    public function validatedBy()
	{
	    return get_class($this).'Validator';
	}
}
