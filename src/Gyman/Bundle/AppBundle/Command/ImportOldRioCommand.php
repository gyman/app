<?php
namespace Gyman\Bundle\AppBundle\Command;

use DateTime;
use Gyman\Domain\Command\CreateMemberCommand;
use Gyman\Domain\Command\CreateVoucherCommand;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ImportOldRioCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
                ->setName('gyman:importoldrio')
            ->addOption(
                'em',
                null,
                InputOption::VALUE_REQUIRED,
                'Entity manager name'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->importMembers($output);
        $this->importLastVouchers($output);
    }

    private function importMembers(OutputInterface $output)
    {
        $oldRioEm = $this->getContainer()->get("doctrine.orm.old_rio_entity_manager");
        $qb = $oldRioEm->getRepository("GymanOldRioBundle:Members")->createQueryBuilder("m");

        $members = $qb->select("m")
            ->getQuery()->getArrayResult();

        $createMember = $this->getContainer()->get("gyman.members.create_member");

        foreach($members as $oldMember) {
            $command = new CreateMemberCommand();
            list($command->lastname, $command->firstname) = sscanf($oldMember["name"], "%s %s");
            if(is_null($command->lastname) || is_null($command->firstname))
            {
                continue;
            }
            $command->birthdate = new DateTime($oldMember["birthdate"]);
            $command->gender = $oldMember["gender"];
            $command->zipcode = $oldMember["zipcode"];
            $command->email = is_null($oldMember["email"]) ? sprintf("%s@gyman.pl", md5(microtime())) :  $oldMember["email"];
            $command->barcode = $oldMember["barcode"];
            $command->foto = $oldMember["foto"];
            $command->phone = $oldMember["phone"];
            $command->notes = $oldMember["id"];

            $createMember->handle($command);

            $output->writeln(sprintf("Imported %s %s, %s", $command->lastname, $command->firstname, $command->email));
        }
    }

    private function importLastVouchers(OutputInterface $output)
    {
        $oldRioEm = $this->getContainer()->get("doctrine.orm.old_rio_entity_manager");
        $qb = $oldRioEm->getRepository("GymanOldRioBundle:Vouchers")->createQueryBuilder("v");

        $vouchers = $qb->select("v")
            ->andWhere("v.created > :date")
            ->andWhere("v.enddate > :today")
            ->setParameters([
                "date" => new DateTime("2016-01-01"),
                "today" => new DateTime()
            ])
            ->getQuery()->getArrayResult();

        $createVoucher = $this->getContainer()->get("gyman.vouchers.create_voucher");

        foreach($vouchers as $oldVoucher) {
            $member = $this->getContainer()->get("doctrine.orm.tenant_entity_manager")->getRepository("GymanAppBundle:Member")->findOneBy(["details.notes" => $oldVoucher["memberId"]]);

            $command = new CreateVoucherCommand();
            $command->startDate = $oldVoucher["startdate"];
            $command->endDate = $oldVoucher["enddate"];
            $command->price = $oldVoucher["price"];
            $command->maximumAmount = $oldVoucher["amountLeft"];
            $command->member = $member;

            $createVoucher->handle($command);

            $output->writeln(sprintf("Created voucher for %s %s, %s", $member->details()->lastname(), $member->details()->firstname(), $member->email()->email()));
        }
    }
}
