<?php
namespace Gyman\Application\Repository;

use Gyman\Domain\Voucher;

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
