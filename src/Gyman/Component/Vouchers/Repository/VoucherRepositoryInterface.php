<?php
namespace Gyman\Component\Vouchers\Repository;

use Gyman\Component\CoreDomain\Repository\RepositoryInterface;
use Gyman\Component\Vouchers\Model\Voucher;

interface VoucherRepositoryInterface extends RepositoryInterface
{
    /**
     * @return Voucher[]
     */
    public function findAll();

    /**
     * @param Voucher $voucher
     * @return mixed
     */
    public function remove($voucher);

    /**
     * @param Voucher $voucher
     * @return null
     */
    public function insert($voucher);
}
