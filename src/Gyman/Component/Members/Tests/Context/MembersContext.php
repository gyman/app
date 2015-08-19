<?php

namespace Gyman\Component\Members\Tests\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;
use Exception;
use Gyman\Component\Members\Factory\MemberFactory;
use Gyman\Component\Members\Repository\InMemoryMemberRepository;
use Gyman\Component\Members\Service\CreateMember;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;

class MembersContext implements Context
{
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
     * @BeforeScenario
     */
    public function prepareUseCases()
    {
        $dispatcher = new EventDispatcher();

        $this->memberRepository = new InMemoryMemberRepository();
        $this->createMember = new CreateMember($this->memberRepository, $dispatcher);

        $dispatcher->addListener(CreateMember::SUCCESS, [$this, 'recordNotification']);
        $dispatcher->addListener(CreateMember::FAILURE, [$this, 'recordNotification']);
    }

    /**
     * @Given /^there is no members$/
     * @Then /^I have (\d+) user in repository$/
     */
    public function thereIsMembersCount($amount = 0)
    {
        $members = $this->memberRepository->findAll();

        $count = count($members);

        if ($count != (int) $amount) {
            throw new Exception(sprintf('Expected amount of members: %d, actually: %d', $amount, $count));
        }
    }

    /**
     * @When /^I add new member with data:$/
     * @param TableNode $table
     */
    public function iAddNewMemberWithData(TableNode $table)
    {
        $member = MemberFactory::createFromArray([
            'firstname' => $table->getColumn(0)[1],
            'lastname'  => $table->getColumn(1)[1],
            'email'     => $table->getColumn(2)[1],
        ]);

        $this->createMember->createMember($member);
    }

    /**
     * @Given /^I should be notified about the member project creation success$/
     */
    public function iShouldBeNotifiedAboutTheMemberProjectCreationSuccess()
    {
        if ($this->lastNotification !== CreateMember::SUCCESS) {
            throw new Exception('No success event thrown');
        }
    }

    /**
     * @param Event $event
     */
    public function recordNotification(Event $event)
    {
        $this->lastNotification = $event->getName();
    }

    /**
     * @When /^I add new member without any data$/
     */
    public function iAddNewMemberWithoutAnyData()
    {
        $member = MemberFactory::createFromArray([]);

        $this->createMember->createMember($member);
    }

    /**
     * @Given /^I should be notified about the member project creation failure$/
     */
    public function iShouldBeNotifiedAboutTheMemberProjectCreationFailure()
    {
        if ($this->lastNotification !== CreateMember::FAILURE) {
            throw new Exception('No success event thrown');
        }
    }
}
