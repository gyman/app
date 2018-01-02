<?php

declare(strict_types=1);

namespace Gyman\Application\Tests\Context;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Exception;
use Gyman\Application\Event\MemberEvent;
use Gyman\Application\Factory\MemberFactory;
use Gyman\Application\Repository\InMemoryDomainEventRepository;
use Gyman\Application\Repository\InMemoryMemberRepository;
use Gyman\Application\Service\CreateMember;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;

class MembersContext implements Context
{
    use LoggedAsAdministratorTrait;

    /**
     * @var InMemoryMemberRepository
     */
    private $memberRepository;

    /**
     * @var
     */
    private $lastNotification;

    /**
     * @var CreateMember
     */
    private $createMember;

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

        $this->memberRepository = new InMemoryMemberRepository();
        $this->domainEventRepository = new InMemoryDomainEventRepository();

        $this->createMember = new CreateMember($this->memberRepository, $dispatcher);

        $dispatcher->addListener(CreateMember::SUCCESS, [$this, 'recordNotification']);
        $dispatcher->addListener(CreateMember::FAILURE, [$this, 'recordNotification']);
    }

    /**
     * @Given /^there is no members$/
     * @Then /^I have (\d+) user in voucherRepository$/
     *
     * @param mixed $amount
     */
    public function thereIsMembersCount($amount = 0)
    {
        $members = $this->memberRepository->findAll();

        $count = count($members);

        if ($count !== (int) $amount) {
            throw new Exception(sprintf('Expected amount of members: %d, actually: %d', $amount, $count));
        }
    }

    /**
     * @When /^I add new member with data:$/
     *
     * @param TableNode $table
     */
    public function iAddNewMemberWithData(TableNode $table)
    {
        $member = MemberFactory::createFromArray([
            'firstname' => $table->getColumn(0)[1],
            'lastname'  => $table->getColumn(1)[1],
            'email'     => $table->getColumn(2)[1],
        ]);

        $this->createMember->createMember($member, $this->user);
    }

    /**
     * @Given /^I should be notified about the member project creation success$/
     */
    public function iShouldBeNotifiedAboutTheMemberProjectCreationSuccess()
    {
        if (CreateMember::SUCCESS !== $this->lastNotification) {
            throw new Exception('No success event thrown');
        }
    }

    /**
     * @param Event $event
     */
    public function recordNotification(Event $event)
    {
        $this->lastNotification = $event->getName();

        if (CreateMember::SUCCESS === $event->getName()) {
            $this->domainEventRepository->insert($event);
        }
    }

    /**
     * @When /^I add new member without any data$/
     */
    public function iAddNewMemberWithoutAnyData()
    {
        $member = MemberFactory::createFromArray([]);

        $this->createMember->createMember($member, $this->user);
    }

    /**
     * @Given /^I should be notified about the member project creation failure$/
     */
    public function iShouldBeNotifiedAboutTheMemberProjectCreationFailure()
    {
        if (CreateMember::FAILURE !== $this->lastNotification) {
            throw new Exception('No success event thrown');
        }
    }

    /**
     * @Given /^domain event on success is stored in voucherRepository$/
     */
    public function domainEventOnSuccessIsStoredInRepository()
    {
        $events = $this->domainEventRepository->findAll();
        $event = array_pop($events);

        if (null === $event || !$event instanceof MemberEvent || CreateMember::SUCCESS !== $event->getName()) {
            throw new Exception('Last stored event is incorrect');
        }
    }

    /**
     * @Given /^domain event on failure is not stored in voucherRepository$/
     */
    public function domainEventOnFailureIsNotStoredInRepository()
    {
        $events = $this->domainEventRepository->findAll();
        $event = array_pop($events);

        if (null !== $event && $event instanceof MemberEvent && CreateMember::FAILURE === $event->getName()) {
            throw new Exception('Last stored event is incorrect');
        }
    }
}
