<?php
namespace Gyman\Bundle\AppBundle\Command;

use Gyman\Application\Command\ClearExpiredCurrentVouchersCommand as Command;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ClearExpiredCurrentVouchersCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('gyman:vouchers:clear_expired')
            ->setDescription('Removes old vouchers from current voucher')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $command = new Command();
        $this->getContainer()->get("tactician.commandbus")->handle($command);
        $data = $this->getContainer()->get("gyman.app.handler.clear_expired_current_vouchers")->lastUpdatedData;

        $output->writeln(sprintf("Updated %d members:", count($data)));
        foreach($data as $row) {
            $output->writeln(sprintf("Unsetted current voucher for member %s.", $row["member_id"]));
        }
    }
}
