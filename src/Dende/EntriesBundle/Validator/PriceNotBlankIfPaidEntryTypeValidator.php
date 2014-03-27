<?php

namespace Dende\EntriesBundle\Validator;

use Symfony\Component\Validator\ExecutionContextInterface;
use Dende\EntriesBundle\Entity\Entry;

class PriceNotBlankIfPaidEntryTypeValidator {

    public static function isPaidAndPriceSet(Entry $entry, ExecutionContextInterface $context) {
        if ($entry->getEntryType() == "paid"
                && trim($entry->getEntryPrice()) == "")
        {
            $context->addViolationAt("entryPrice","Podaj cenę zapłaconą za wejście!");
        }
    }
}
