<?php

namespace Gyman\Bundle\DefaultBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\MissingOptionsException;

/**
 * @Annotation
 */
class DateRangeConstraint extends Constraint
{
    public $minMessage = 'Data powinna być po {{ limit }}.';
    public $maxMessage = 'Data powinna być przed {{ limit }}.';
    public $invalidMessage = 'This value should be a valid date.';
    public $min;
    public $max;

    public function __construct($options = null)
    {
        parent::__construct($options);

        if (null === $this->min && null === $this->max) {
            throw new MissingOptionsException('Either option "min" or "max" must be given for constraint ' . __CLASS__, [
            'min', 'max', ]);
        }

        if (null !== $this->min) {
            $this->min = new \DateTime($this->min);
        }

        if (null !== $this->max) {
            $this->max = new \DateTime($this->max);
        }
    }

    public function validatedBy()
    {
        return "Gyman\Bundle\DefaultBundle\Validator\DateRangeValidator";
    }
}
