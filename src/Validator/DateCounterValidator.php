<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use App\Service\TicketCounterByDate;

class DateCounterValidator extends ConstraintValidator
{
	private $date;

	public function __construct(TicketCounterByDate $date)
	{
		$this->date = $date;
	}

    public function validate($value, Constraint $constraint)
    {
        /* @var $constraint App\Validator\DateCounter */

        $i = $this->date->countByDate($value);

        if ($i >= 1000) {

        	$this->context->buildViolation($constraint->message)
            ->setParameter('{{ value }}', $value->format('Y-m-d'))
            ->addViolation();
        }

        
    }
}
