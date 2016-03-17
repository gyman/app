<?php
namespace Gyman\Application\Tests\Unit\Handler;

use DateTime;
use Gyman\Application\Factory\MemberFactory;
use Gyman\Application\Command\UpdateMemberCommand;
use Gyman\Application\Handler\OpenEntryHandler;
use Gyman\Application\Handler\UpdateMemberHandler;
use Mockery as m;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class OpenEntryHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tears down the fixture, for example, close a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        parent::tearDown();
        m::close();
    }

    public function testHandle()
    {

    }
}
