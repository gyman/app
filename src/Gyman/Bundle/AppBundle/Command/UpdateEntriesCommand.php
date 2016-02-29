<?php
namespace Gyman\Bundle\AppBundle\Command;

use Carbon\Carbon;
use DateTime;
use Doctrine\ORM\QueryBuilder;
use Gyman\Bundle\AppBundle\Entity\Entry;
use Gyman\Bundle\AppBundle\Entity\Member;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateEntriesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
                ->setName('gyman:entries:close')
                ->setDescription('Closes finished entries')
                ->addOption(
                    'em',
                    null,
                    InputOption::VALUE_REQUIRED,
                    'Entity manager name'
                )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get($input->getOption("em"));

        $memberRepository = $this->getContainer()->get('doctrine.orm.tenant_entity_manager')->getRepository('GymanAppBundle:Member');

        /** @var QueryBuilder $queryBuilder * */
        $queryBuilder = $memberRepository->createQueryBuilder("m");
        $expr = $queryBuilder->expr();

        $queryBuilder
            ->join("m.lastEntry", "e")
            ->where($expr->andX(
                $expr->isNotNull("m.lastEntry"),
                $expr->isNull("e.endDate"),
                $expr->lt("e.startDate", ":date")
            ))
            ->setParameters([
                "date" => Carbon::parse(sprintf("-%d minutes", $input->getOption("minutes")))
            ])
        ;

        /** @var Entry[] $entries */
        $entries = array_map(function(Member $member) use ($em) {
            $entry = $member->lastEntry();
            $entry->closeEntry(new DateTime("now"));
            $em->persist($entry);
            return $entry->id();
        }, $queryBuilder->getQuery()->getResult());

        $em->flush();

        $message = sprintf('Found and updated %d member\'s last entries', count($entries));

        $output->writeln($message);
        $this->getContainer()->get('logger')->info($message, $entries);
    }
}
