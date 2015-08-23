<?php

namespace Gyman\Component\Vouchers\Tests\Context;

use Behat\Behat\Context\Context;
use Gyman\Component\CoreDomain\Repository\InMemoryDomainEventRepository;
use Gyman\Component\CoreDomain\Tests\LoggedAsAdministratorTrait;
use Gyman\Component\Vouchers\Repository\InMemoryVoucherRepository;
use Gyman\Component\Vouchers\Service\SellVoucher;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class VouchersContext
 * @package Gyman\Component\Vouchers
 */
class VouchersContext implements Context
{
    use LoggedAsAdministratorTrait;

    /**
     * @var InMemoryVoucherRepository
     */
    private $voucherRepository;

    /**
     * @var
     */
    private $lastNotification;

    /**
     * @var SellVoucher
     */
    private $sellVoucher;

    /**
     * @var InMemoryDomainEventRepository
     */
    private $domainEventRepository;

    /**
     * @BeforeScenario
     */
    public function prepareUseCases()
    {
        $dispatcher = new EventDispatcher();

        $this->voucherRepository = new InMemoryVoucherRepository();
        $this->domainEventRepository = new InMemoryDomainEventRepository();

        $this->sellVoucher = new SellVoucher($this->voucherRepository, $dispatcher);

        $dispatcher->addListener(SellVoucher::SUCCESS, [$this, 'recordNotification']);
        $dispatcher->addListener(SellVoucher::FAILURE, [$this, 'recordNotification']);
    }
}
