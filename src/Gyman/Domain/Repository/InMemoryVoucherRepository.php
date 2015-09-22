<?php
namespace Gyman\Domain\Repository;

use Gyman\Domain\Model\Voucher;

/**
 * Class InMemoryVoucherRepository
 * @package Gyman\Domain
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
    public function remove($voucher)
    {
        unset($this->vouchers[$voucher->email()->email()]);
    }

    /**
     * @param Voucher $voucher
     * @return null
     */
    public function insert($voucher)
    {
        $this->vouchers[$voucher->email()->email()] = $voucher;
    }
}
