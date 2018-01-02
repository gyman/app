<?php

declare(strict_types=1);

namespace Gyman\Application\Tests\Context;

trait HeHasVouchersTrait
{
    /**
     * @Given /^he has (\d+) vouchers$/
     *
     * @param mixed $count
     */
    public function heHasVouchers($count)
    {
        if ($count !== count($this->member->vouchers())) {
            throw new Exception(sprintf(
                'Should be %d vouchers, but found %d',
                $count,
                count($this->member->vouchers())
            ));
        }
    }
}
