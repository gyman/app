<?php
namespace Gyman\Bundle\MultiDatabaseBundle\Command;

use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\ClubBundle\Entity\Subdomain;
use Gyman\Bundle\UserBundle\Entity\User;
use Gyman\Domain\Model\EmailAddress;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AssignUserToClubCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('gyman:club:assign-user')
            ->setDescription('Assigns existing user to club entity')
            ->addArgument('email', InputArgument::REQUIRED, 'Users email')
            ->addArgument('subdomain', InputArgument::REQUIRED, 'Subdomain name');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $arguments = $input->getArguments();

        $em = $this->getContainer()->get('doctrine.orm.default_entity_manager');

        /** @var User $user */
        $user = $em->getRepository('UserBundle:User')->findOneByEmailAddress(new EmailAddress($arguments['email']));

        if (is_null($user)) {
            throw new \Exception('User not found');
        }

        /** @var Club $club */
        $club = $em->getRepository('ClubBundle:Club')->findOneBySubdomain(new Subdomain($arguments['subdomain']));

        if (is_null($club)) {
            throw new \Exception('Club not found');
        }

        if ($user->getClubs()->contains($club)) {
            throw new \Exception('User already assigned to club!');
        }

        $user->getClubs()->add($club);

        $em->persist($user);
        $em->flush();
    }
}
