<?php

namespace Gyman\Component\Vouchers\Repository;

use Gyman\Component\Vouchers\Model\Voucher;

/**
 * Class InMemoryVoucherRepository
 * @package Gyman\Component\Vouchers
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
     * @return Voucher
     */
    public function findOneByEmailAddress(EmailAddress $email)
    {
        $address = $email->email();

        return array_key_exists($address, $this->vouchers) ? $this->vouchers[$address] : null;
    }

    /**
     * @param Voucher $voucher
     * @return mixed
     */
    public function remove(Voucher $voucher)
    {
        unset($this->vouchers[$voucher->email()->email()]);
    }

    /**
     * @param Voucher $voucher
     * @return null
     */
    public function insert(Voucher $voucher)
    {
        $this->vouchers[$voucher->email()->email()] = $voucher;
    }
}
