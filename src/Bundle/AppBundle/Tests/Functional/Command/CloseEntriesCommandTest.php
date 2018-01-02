<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Tests\Functional\Command;

use Gyman\Bundle\AppBundle\Repository\MemberRepository;
use Gyman\Component\Test\BaseFunctionalTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

/**
 * @coversNothing
 */
class CloseEntriesCommandTest extends BaseFunctionalTestCase
{
    public function testCommand()
    {
        /** @var MemberRepository $repository */
        $repository = $this->getContainer()->get('gyman.members.repository');

        $this->assertCount(1, $repository->findAllByExpiredLastEntry());
        $content = $this->runTestedCommand();
        $this->assertContains('default: Updated 1 members:', $content, $content);
        $this->assertContains('Closed last entry for member uirapuru@tlen.pl.', $content, $content);

        $this->assertCount(0, $repository->findAllByExpiredLastEntry());
    }

    private function runTestedCommand()
    {
        $kernel = $this->getContainer()->get('kernel');

        $application = new Application($kernel);
        $application->setAutoExit(false);

        $input = new ArrayInput([
            'command' => 'gyman:entries:close_expired',
        ]);

        $output = new BufferedOutput();
        $application->run($input, $output);

        $content = $output->fetch();

        return $content;
    }
}
