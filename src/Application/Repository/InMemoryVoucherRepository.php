<?php

declare(strict_types=1);

namespace Gyman\Application\Repository;

use Gyman\Domain\Member\EmailAddress;
use Gyman\Domain\Voucher;

/**
 * Class InMemoryVoucherRepository.
 */
class InMemoryVoucherRepository implements VoucherRepositoryInterface
{
    /**
     * @var Voucher[]
     */
    private $vouchers = [];

    /**
     * @return Voucher[]
     */
    public function findAll()
    {
        return $this->vouchers;
    }

    /**
     * @param $email
     *
     * @return Voucher
     */
    public function findOneByEmailAddress(EmailAddress $email)
    {
        throw \Exception('implement this!');
    }

    /**
     * @param Voucher $voucher
     *
     * @return mixed
     */
    public function remove($voucher)
    {
        unset($this->vouchers[spl_object_hash($voucher)]);
    }

    /**
     * @param Voucher $voucher
     */
    public function insert($voucher)
    {
        $this->vouchers[spl_object_hash($voucher)] = $voucher;
    }

    public function save(Voucher $voucher)
    {
        $this->insert($voucher);
    }
}
