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
                ->addOption("dry")
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
//        $em = $this->getContainer()->get("doctrine")->getManager($input->getOption("em"));
        $em = $this->getContainer()->get("doctrine")->getManager("tenant");
        $entryRepository = $em->getRepository('GymanAppBundle:Entry');

        /** @var QueryBuilder $queryBuilder * */
        $queryBuilder = $entryRepository->createQueryBuilder("e");
        $expr = $queryBuilder->expr();

        $queryBuilder
            ->join("e.occurrence", "o")
            ->where($expr->andX(
                $expr->lt("e.startDate", ":date"),
                $expr->isNull("e.endDate"),
                $expr->lte("o.endDate", ":date")
            ))
            ->setParameters([
                "date" => Carbon::parse("now"),
            ])
        ;

        $results = $queryBuilder->getQuery()->getResult();

        if(count($results) === 0) {
            $output->writeln("No entries found!");
        }

        if(!$input->getOption("dry")) {
            /** @var Entry[] $entries */
            $entries = array_map(function(Entry $entry) use ($em, $input) {
                    $entry->closeEntry($entry->occurrence()->endDate());
                    $em->persist($entry);
                return $entry->id();
            }, $results);

            $em->flush();
            $message = sprintf('Found and updated %d entries', count($entries));
            $this->getContainer()->get('logger')->info($message, $entries);
        }

        if($input->getOption("dry")) {
            $entries = $results;
            $output->writeln("<error>Dry mode!</error>");
            $message = sprintf('Found %d entries', count($entries));
        }

        $output->writeln($message);
    }
}
