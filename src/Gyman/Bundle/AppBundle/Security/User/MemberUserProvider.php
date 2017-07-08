<?php
namespace Gyman\Bundle\AppBundle\Security\User;

use Gyman\Bundle\AppBundle\Security\MemberUser;
use Gyman\Application\Repository\MemberRepositoryInterface;
use Gyman\Domain\Member\EmailAddress;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class MemberUserProvider implements UserProviderInterface
{
    /**
     * @var MemberRepositoryInterface
     */
    private $memberRepository;

    /**
     * MemberUserProvider constructor.
     * @param MemberRepositoryInterface $memberRepository
     */
    public function __construct(MemberRepositoryInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function loadUserByUsername($username)
    {
        $member = $this->memberRepository->findOneByEmailAddress(new EmailAddress($username));

        if($member === null) {
            throw new UsernameNotFoundException(
                sprintf('Username "%s" does not exist.', $username)
            );
        }

        $password = $member->password();
        $salt = $member->salt();
        $roles = ["ROLE_MEMBER"];

        return new MemberUser($username, $password, $salt, $roles);
    }

    public function refreshUser(UserInterface $user)
    {
        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return MemberUser::class === $class;
    }
}