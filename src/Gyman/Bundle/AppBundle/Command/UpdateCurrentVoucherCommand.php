<?php
namespace Gyman\Bundle\AppBundle\Command;

use Gyman\Application\Command\UpdateCurrentVoucherCommand as Command;
use Gyman\Domain\Member;
use Monolog\Logger;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateCurrentVoucherCommand extends ContainerAwareCommand
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
            ->setName('gyman:vouchers:update_current')
            ->setDescription('Sets new current voucher')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->logger->addInfo(sprintf("Updating current vouchers in '%s' database", $input->getOption("club")));

        $command = new Command();
        $this->getContainer()->get("tactician.commandbus")->handle($command);
        $data = $this->getContainer()->get("gyman.app.handler.update_current_vouchers")->lastUpdatedData;

        $output->writeln(sprintf("Updated %d members:", count($data)));

        /** @var Member $member */
        foreach($data as $member) {
            $msg = sprintf("Set current voucher #%s for member %s.", $member->currentVoucher()->id(), $member->email());
            $output->writeln($msg);
            $this->getContainer()->get("logger")->addInfo($msg);
        }
    }
}
