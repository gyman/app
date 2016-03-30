<?php
namespace Gyman\Bundle\AppBundle\Command;

use Gyman\Application\Command\ClearExpiredCurrentVouchersCommand as Command;
use Monolog\Logger;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ClearExpiredCurrentVouchersCommand extends ContainerAwareCommand
{
    /** @var  Logger */
    private $logger;

    /**
     * @param mixed $logger
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;
    }

    protected function configure()
    {
        $this
            ->setName('gyman:vouchers:clear_expired')
            ->setDescription('Removes old vouchers from current voucher')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->logger->addInfo(sprintf("Looking for expired vouchers in '%s' database", $input->getOption("club")));

        $command = new Command();
        $this->getContainer()->get("tactician.commandbus")->handle($command);
        $data = $this->getContainer()->get("gyman.app.handler.clear_expired_current_vouchers")->lastUpdatedData;

        $output->writeln(sprintf("Updated %d members:", count($data)));
        
        foreach($data as $row) {
            $msg = sprintf("Unsetted current voucher for member %s.", $row["member_id"]);
            $output->writeln($msg);
            $this->getContainer()->get("logger")->addInfo($msg);
        }
    }

}
