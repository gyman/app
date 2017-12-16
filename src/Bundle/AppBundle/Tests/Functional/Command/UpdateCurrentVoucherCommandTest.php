<?php
namespace Gyman\Bundle\AppBundle\Tests\Functional\Command;

use Gyman\Bundle\AppBundle\Repository\MemberRepository;
use Gyman\Bundle\AppBundle\Repository\VoucherRepository;
use Gyman\Component\Test\BaseFunctionalTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

class UpdateCurrentVoucherCommandTest extends BaseFunctionalTestCase
{
    public function testCommand() {
        /** @var VoucherRepository $repository */
        $repository = $this->getContainer()->get("gyman.vouchers.repository");

        $this->assertCount(1, $repository->findAllNotSetCurrentVouchers());
        $content = $this->runTestedCommand();
        $this->assertContains("Updated 1 members:", $content);
        $this->assertContains("for member test12@test2.pl", $content);

        $this->assertCount(0, $repository->findAllNotSetCurrentVouchers());
    }

    private function runTestedCommand()
    {
        $kernel = $this->getContainer()->get('kernel');

        $application = new Application($kernel);
        $application->setAutoExit(false);

        $input = new ArrayInput(array(
            'command' => 'gyman:vouchers:update_current'
        ));

        $output = new BufferedOutput();
        $application->run($input, $output);

        $content = $output->fetch();

        return $content;
    }
}