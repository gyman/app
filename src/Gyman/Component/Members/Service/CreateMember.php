<?php

namespace Gyman\Component\Members\Service;

use Gyman\Component\CoreDomain\Model\UserInterface;
use Gyman\Component\Members\Event\MemberEvent;
use Gyman\Component\Members\Model\Member;
use Gyman\Component\Members\Repository\MemberRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class CreateMember
 * @package Gyman\Component\Members
 */
final class CreateMember
{
    const SUCCESS = 'gyman.member_created.success';
    const FAILURE = 'gyman.member_created.failure';

    /**
     * @var MemberRepositoryInterface
     */
    private $repository;

    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * CreateMember constructor.
     * @param MemberRepositoryInterface $repository
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(MemberRepositoryInterface $repository, EventDispatcherInterface $dispatcher)
    {
        $this->repository = $repository;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param Member $member
     * @param UserInterface $author
     */
    public function createMember(Member $member, UserInterface $author)
    {
        if (!$member->details()->hasValidData() || empty($member->email()->email())) {
            $this->dispatcher->dispatch(self::FAILURE, new MemberEvent($member));

            return;
        }

        $this->repository->insert($member);
        $this->dispatcher->dispatch(self::SUCCESS, new MemberEvent($member, $author));
    }
}
