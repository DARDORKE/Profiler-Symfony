<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class IsFibonacciValidator extends ConstraintValidator
{
    public const FIBONACCI_SUITE = [0, 1, 1, 2, 3, 5, 8, 13, 21, 34];

    public function validate($value, Constraint $constraint)
    {
        /* @var $constraint IsFibonacci */

        if (null === $value || '' === $value) {
            return;
        }

        if (!in_array((int) $value, self::FIBONACCI_SUITE, true)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value)
                ->addViolation();
        }
    }
}