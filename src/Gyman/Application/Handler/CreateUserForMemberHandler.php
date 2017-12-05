<?php
namespace Gyman\Application\Handler;

use FOS\UserBundle\Util\UserManipulator;
use Gyman\Application\Command\CreateUserForMemberCommand;
use Gyman\Application\Event\UserForMemberCreated;
use Gyman\Bundle\AppBundle\EntityManager\UserManager;
use Gyman\Bundle\AppBundle\Repository\UserRepository;
use Gyman\Domain\User;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class CreateUserForMemberHandler
{
    /** @var  UserRepository */
    private $userRepository;

    /** @var  UserManipulator */
    private $userManipulator;

    /** @var  UserManager */
    private $userManager;

    /** @var EventDispatcherInterface */
    private $eventDispatcher;

    public function __construct(UserRepository $userRepository, UserManipulator $userManipulator, UserManager $userManager, EventDispatcherInterface $eventDispatcher)
    {
        $this->userRepository = $userRepository;
        $this->userManipulator = $userManipulator;
        $this->userManager = $userManager;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function handle(CreateUserForMemberCommand $command)
    {
        /** @var User $user */
        $user = $this->userRepository->findOneBy(['member' => $command->member()]);

        if($user === null) {
            $user = $this->userManipulator->create(
                $command->member()->email()->email(),
                $command->currentPassword(),
                $command->member()->email()->email(),
                true,
                false
            );
            
            $user->setRoles(["ROLE_MEMBER"]);
        } else {
            $user->setPlainPassword($command->currentPassword());
        }

        $user->setInvitationToken($command->token());
        $user->setMember($command->member());
        $this->userManager->updateUser($user);

        $this->eventDispatcher->dispatch(UserForMemberCreated::$name, new UserForMemberCreated($user, $command->currentPassword()));
    }
}