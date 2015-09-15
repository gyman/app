<?php
namespace Gyman\Domain\Service;

use Gyman\Domain\Event\MemberEvent;
use Gyman\Domain\Model\Member;
use Gyman\Domain\Model\UserInterface;
use Gyman\Domain\Repository\MemberRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class CreateMember
 * @package Gyman\Domain
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
