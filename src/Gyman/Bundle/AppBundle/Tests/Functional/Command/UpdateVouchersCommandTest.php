<?php
namespace Gyman\AppBundle\Tests\Functional\Command;

use Gyman\Component\Test\BaseFunctionalTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\NullOutput;

class UpdateVouchersCommandTest extends BaseFunctionalTestCase
{
    public function testCommand() {
        $repository = $this->getContainer()->get("gyman.members.repository");

        $this->assertCount(1, $repository->findAllByExpiredCurrentVoucher());
        $content = $this->runTestedCommand();
        $this->assertEmpty($content, $content);
        $this->assertCount(0, $repository->findAllByExpiredCurrentVoucher());

    }

    private function runTestedCommand()
    {
        $kernel = $this->getContainer()->get('kernel');

        $application = new Application($kernel);
        $application->setAutoExit(false);

        $input = new ArrayInput(array(
            'command' => 'vouchers:update'
        ));

        $output = new BufferedOutput();
        $application->run($input, $output);

        $content = $output->fetch();

        return $content;
    }
}