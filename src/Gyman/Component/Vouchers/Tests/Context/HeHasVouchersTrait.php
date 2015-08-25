<?php
namespace Gyman\Component\Vouchers\Tests\Context;

trait HeHasVouchersTrait
{
    /**
     * @Given /^he has (\d+) vouchers$/
     */
    public function heHasVouchers($count)
    {
        if ($count != count($this->member->vouchers())) {
            throw new Exception(sprintf(
                'Should be %d vouchers, but found %d',
                $count,
                count($this->member->vouchers())
            ));
        }
    }
}
