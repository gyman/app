<?php
namespace Gyman\Bundle\AppBundle\DataFixtures\Club\ORM;

use Carbon\Carbon;
use Dende\CommonBundle\DataFixtures\BaseFixture;
use Gyman\Bundle\AppBundle\Factory\VoucherFactory;

class VouchersData extends BaseFixture
{
    protected $dir = __DIR__;

    public function insert($array)
    {
        $array['startDate'] = Carbon::parse($array['startDate']);
        $array['endDate'] = Carbon::parse($array['endDate']);

        $voucher = VoucherFactory::createFromArray($array);

        return $voucher;
    }

    public function getOrder()
    {
        return 0;
    }
}
