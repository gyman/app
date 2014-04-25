<?php

namespace Dende\ScheduleBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * @author uirapuru
 */
class AtLeastOneDaySelectedIfNotSingle extends Constraint {

    public $message = 'Musisz zaznaczyć conajmniej jeden dzień, w którym wydarzenie ma się powtarzać!';

}
