<?php
namespace Gyman\Bundle\VouchersBundle\DataFixtures\Club\ORM;

use DateTime;
use Dende\CommonBundle\DataFixtures\BaseFixture;
use Gyman\Bundle\VouchersBundle\Entity\Entry;
use Gyman\Bundle\VouchersBundle\Entity\Price;
use Gyman\Bundle\VouchersBundle\Entity\Voucher;

class EntriesData extends BaseFixture
{
    protected $dir = __DIR__;

    public function getOrder()
    {
        return 300;
    }

    public function insert($params)
    {
        $price = null;

        if ($params['price']) {
            list($amount, $currency) = sscanf($params['price'], "%d %s");
            $price = new Price($amount, $currency);
        }

        $entry = new Entry(
            new DateTime($params['startDate']),
            $params['type'],
            new DateTime($params['endDate']),
            $price
        );

        if ($entry->isType(Entry::TYPE_VOUCHER)) {
            /** @var Voucher $voucher */
            $voucher = $this->getReference($params['voucher']);
            $voucher->addEntry($entry);
        }

        return $entry;
    }
}
