<?php

namespace Gyman\Bundle\ScheduleBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * Description of RequiredIfNoNewActivityConstraint
 * @Annotation
 * @author uirapuru
 */
class RequiredIfNoNewActivity extends Constraint
{
    public $message = 'Musisz wybrać lub dodać nową aktywność';
}
