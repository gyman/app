<?php
namespace Gyman\Application\Handler;

use Gyman\Application\Command\CreateUserForMemberCommand;
use Gyman\Application\Factory\UserFactory;
use Gyman\Bundle\AppBundle\Repository\UserRepository;
use Gyman\Bundle\AppBundle\Security\MemberUser;

class CreateUserForMemberHandler
{
    /** @var  UserRepository */
    private $memberUserRepository;

    /**
     * CreateUserForMemberHandler constructor.
     * @param UserRepository $memberUserRepository
     */
    public function __construct(UserRepository $memberUserRepository)
    {
        $this->memberUserRepository = $memberUserRepository;
    }

    public function handle(CreateUserForMemberCommand $command)
    {
        /** @var MemberUser $user */
        $user = $this->memberUserRepository->findOneBy(['username' => $command->member()->email()->email()]);

        if($user === null) {
            $user = UserFactory::create($command->member(), null, time(), $command->token());
            $this->memberUserRepository->insert($user);
        } else {
            $user->setToken($command->token());
            $this->memberUserRepository->update($user);
        }
    }
}