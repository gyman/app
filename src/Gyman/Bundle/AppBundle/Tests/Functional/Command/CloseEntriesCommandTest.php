<?php
namespace Gyman\AppBundle\Tests\Functional\Command;

use Gyman\Bundle\AppBundle\Repository\MemberRepository;
use Gyman\Component\Test\BaseFunctionalTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

class CloseEntriesCommandTest extends BaseFunctionalTestCase
{
    public function testCommand() {
        /** @var MemberRepository $repository */
        $repository = $this->getContainer()->get("gyman.members.repository");

        $this->assertCount(2, $repository->findAllByExpiredLastEntry());
        $content = $this->runTestedCommand();
        $this->assertContains("default: Updated 2 members:", $content, $content);
        $this->assertContains("Closed last entry for member uirapuru@tlen.pl.", $content, $content);
        $this->assertContains("Closed last entry for member test01@test.pl", $content, $content);

        $this->assertCount(0, $repository->findAllByExpiredLastEntry());
    }

    private function runTestedCommand()
    {
        $kernel = $this->getContainer()->get('kernel');

        $application = new Application($kernel);
        $application->setAutoExit(false);

        $input = new ArrayInput(array(
            'command' => 'gyman:entries:close_expired'
        ));

        $output = new BufferedOutput();
        $application->run($input, $output);

        $content = $output->fetch();

        return $content;
    }
}