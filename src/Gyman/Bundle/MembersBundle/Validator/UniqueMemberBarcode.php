<?php
namespace Gyman\Bundle\MembersBundle\Validator;

use Symfony\Component\Validator\Constraint;

class UniqueMemberBarcode extends Constraint
{
    public $message = 'Barcode \'%barcode%\' already used by other user!';

    public function validatedBy()
    {
        return 'UniqueMemberBarcodeValidator';
    }

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
