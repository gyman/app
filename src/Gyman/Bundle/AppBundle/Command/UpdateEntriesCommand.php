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
        $em = $this->getContainer()->get("doctrine")->getManager($input->getOption("em"));
        $entryRepository = $em->getRepository('GymanAppBundle:Entry');

        /** @var QueryBuilder $queryBuilder * */
        $queryBuilder = $entryRepository->createQueryBuilder("e");
        $expr = $queryBuilder->expr();

        $queryBuilder
            ->join("e.occurrence", "o")
            ->where($expr->andX(
                $expr->lt("e.startDate", ":now"),
                $expr->isNull("e.endDate"),
                $expr->lte("o.endDate", ":now")
            ))
            ->setParameters([
                "now" => new DateTime(),
            ])
        ;

        $results = $queryBuilder->getQuery()->getResult();

        /** @var Entry[] $entries */
        $entries = array_map(function(Entry $entry) use ($em, $input) {
            if(!$input->getOption("dry")) {
                $entry->closeEntry(new DateTime("now"));
                $em->persist($entry);
            }
            return $entry->id();
        }, $results);

        if(!$input->getOption("dry")) {
            $em->flush();
        } else {
            $output->writeln("<error>Dry mode!</error>");
        }
        $message = sprintf('Found and updated %d entries', count($entries));

        $output->writeln($message);
        $this->getContainer()->get('logger')->info($message, $entries);
    }
}
