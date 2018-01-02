<?php

declare(strict_types=1);

namespace Gyman\Application\Event;

use Gyman\Domain\Member;
use Gyman\Domain\UserInterface;
use Gyman\Domain\Voucher;
use Symfony\Component\EventDispatcher\Event;

class VoucherEvent extends Event implements DomainEventInterface
{
    /**
     * @var Voucher
     */
    private $voucher;

    /**
     * @var UserInterface
     */
    private $author;

    /**
     * VoucherEvent constructor.
     *
     * @param Member        $member
     * @param Voucher       $voucher
     * @param UserInterface $author  |null
     */
    public function __construct(Voucher $voucher, $author = null)
    {
        $this->voucher = $voucher;
        $this->author = $author;
    }
}
