<?php

declare(strict_types=1);

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
     *
     * @return mixed
     */
    public function remove($voucher);

    /**
     * @param Voucher $voucher
     */
    public function insert($voucher);

    /**
     * @param Voucher $voucher
     */
    public function save(Voucher $voucher);
}
