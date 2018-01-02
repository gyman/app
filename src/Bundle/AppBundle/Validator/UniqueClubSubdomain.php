<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Validator;

use Symfony\Component\Validator\Constraint;

class UniqueClubSubdomain extends Constraint
{
    public $message = 'Subdomain \'%string%\' is already taken, please choose different.';

    public function validatedBy()
    {
        return get_class($this) . 'Validator';
    }
}
