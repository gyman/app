<?php
namespace Gyman\Component\Vouchers\Tests\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use DateTime;
use Exception;
use Gyman\Component\CoreDomain\Repository\InMemoryDomainEventRepository;
use Gyman\Component\CoreDomain\Tests\LoggedAsAdministratorTrait;
use Gyman\Component\Members\Model\Member;
use Gyman\Component\Vouchers\Exception\ExceededMaximumAmountOfEntriesException;
use Gyman\Component\Vouchers\Exception\LastEntryIsStillOpenedException;
use Gyman\Component\Vouchers\Exception\NoCurrentVoucherForVoucherEntryException;
use Gyman\Component\Vouchers\Factory\VoucherFactory;
use Gyman\Component\Vouchers\Model\Entry;
use Gyman\Component\Vouchers\Model\Price;
use Gyman\Component\Vouchers\Repository\InMemoryEntryRepository;
use Gyman\Component\Vouchers\Repository\InMemoryVoucherRepository;
use Gyman\Component\Vouchers\Service\OpenEntry;
use Gyman\Component\Vouchers\Service\SellVoucher;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class EntriesContext
 * @package Gyman\Component\Vouchers
 * @property Member $member
 */
class EntriesContext implements Context
{
    use LoggedAsAdministratorTrait;
    use HeHasVouchersTrait;
    use MemberExistsTrait;

    /**
     * @var InMemoryEntryRepository
     */
    private $entriesRepository;

    /**
     * @var Event
     */
    private $lastNotification;

    /**
     * @var OpenEntry
     */
    private $openEntry;

    /**
     * @var InMemoryDomainEventRepository
     */
    private $domainEventRepository;

    /**
     * @var Member
     */
    private $member;

    /**
     * @BeforeScenario
     * @param BeforeScenarioScope $scope
     */
    public function prepareUseCases(BeforeScenarioScope $scope)
    {
        $dispatcher = new EventDispatcher();

        $this->entriesRepository = new InMemoryEntryRepository();
        $this->domainEventRepository = new InMemoryDomainEventRepository();

        $this->openEntry = new OpenEntry($this->entriesRepository, $dispatcher);

        $dispatcher->addListener(OpenEntry::SUCCESS, [$this, 'recordNotification']);
        $dispatcher->addListener(OpenEntry::FAILURE, [$this, 'recordNotification']);
    }

    /**
     * @param Event $event
     */
    public function recordNotification(Event $event)
    {
        $this->lastNotification = $event->getName();

        if ($event->getName() === SellVoucher::SUCCESS) {
            $this->domainEventRepository->insert($event);
        }
    }

    /**
     * @When /^member has no last entry$/
     */
    public function memberHasNoLastEntry()
    {
        if (!is_null($this->member->lastEntry())) {
            throw new Exception("Member's last entry is set!");
        }
    }

    /**
     * @Given /^he has (\d+) entries$/
     */
    public function heHasEntries($arg1)
    {
        if (count($this->member->entries()) != $arg1) {
            throw new Exception(sprintf(
                'Expected amount of entries %d, actually %d',
                $arg1,
                count($this->member->entries())
            ));
        }
    }

    /**
     * @Given /^I add \'([^\']*)\' entry for him$/
     */
    public function iAddEntryForHim($type, $price = null)
    {
        if ($price) {
            list($amount, $currency) = sscanf($price, '%d %s');
            $price = new Price($amount, $currency);
        }

        $entry = new Entry(new \DateTime(), $type, null, $price);

        try {
            $this->openEntry->openEntry($this->member, $entry, $this->user);
        } catch (LastEntryIsStillOpenedException $e) {
        } catch (NoCurrentVoucherForVoucherEntryException $e) {
        } catch (ExceededMaximumAmountOfEntriesException $e) {
        }
    }

    /**
     * @Then /^he should have (\d+) entry$/
     */
    public function heShouldHaveEntry($count)
    {
        if ($this->member->entries()->count() != $count) {
            throw new Exception(sprintf(
                'Expected amount of member entries: %d, actually: %d',
                $count,
                $this->member->entries()->count()
            ));
        }
    }

    /**
     * @Given /^he should have set last entry$/
     */
    public function heShouldHaveSetLastEntry()
    {
        if (!$this->member->hasLastEntry()) {
            throw new Exception('User has no last entry');
        }
    }

    /**
     * @Given /^I should be notified about the member entry success$/
     */
    public function iShouldBeNotifiedAboutTheMemberEntrySuccess()
    {
        if ($this->lastNotification !== OpenEntry::SUCCESS) {
            throw new Exception('No success event thrown');
        }
    }

    /**
     * @Given /^he has current voucher$/
     */
    public function heHasCurrentVoucher()
    {
        if (!$this->member->hasCurrentVoucher()) {
            throw new Exception('User has no current voucher');
        }
    }

    /**
     * @Given /^his current voucher has (\d+) entries left$/
     */
    public function hisCurrentVoucherHasEntriesLeft($count)
    {
        if (!$this->member->currentVoucher()) {
            throw new Exception('Member has no current voucher');
        }

        $freeEntries = $this->member->currentVoucher()->getFreeAmount();

        if ($freeEntries != $count) {
            throw new Exception(sprintf(
                'Expected amount of voucher entries: %d, actually: %d',
                $count,
                $freeEntries
            ));
        }
    }

    /**
     * @Given /^current voucher is added$/
     * @Given /^current voucher is added with (\d+) entries$/
     */
    public function currentVoucherIsAdded($amount = 10)
    {
        $voucher = VoucherFactory::createFromArray([
            'startDate'     => '-1 hour',
            'endDate'       => '+2 hour',
            'maximumAmount' => $amount,
        ]);

        $voucherRepo = new InMemoryVoucherRepository();

        (new SellVoucher($voucherRepo, new EventDispatcher()))->sellVoucher($this->member, $voucher, $this->user);
    }

    /**
     * @Given /^I add \'([^\']*)\' entry for him for \'([^\']*)\'$/
     */
    public function iAddEntryForHimFor($type, $price)
    {
        $this->iAddEntryForHim($type, $price);
    }

    /**
     * @Given /^current voucher is added with unlimited entries$/
     */
    public function currentVoucherIsAddedWithUnlimitedEntries()
    {
        $this->currentVoucherIsAdded(null);
    }

    /**
     * @Given /^his current voucher has unlimited entries left$/
     */
    public function hisCurrentVoucherHasUnlimitedEntriesLeft()
    {
        $free = $this->member->currentVoucher()->getFreeAmount();

        if ($free !== null) {
            throw new Exception(sprintf(
                'Expected unlimited free amount, got %s free entries',
                $free
            ));
        }
    }

    /**
     * @Given /^I should be notified about the member entry error$/
     */
    public function iShouldBeNotifiedAboutTheMemberEntryError()
    {
        if ($this->lastNotification !== OpenEntry::FAILURE) {
            throw new Exception('No failuire event thrown');
        }
    }

    /**
     * @Given /^I close last entry$/
     */
    public function iCloseLastEntry()
    {
        if (!$this->member->lastEntry()) {
            throw new Exception('Member has no last entry');
        }

        $this->member->lastEntry()->closeEntry(new DateTime());
    }

    /**
     * @Given /^he has no current voucher$/
     */
    public function heHasNoCurrentVoucher()
    {
        if ($this->member->hasCurrentVoucher()) {
            throw new Exception('User has current voucher');
        }
    }
}
