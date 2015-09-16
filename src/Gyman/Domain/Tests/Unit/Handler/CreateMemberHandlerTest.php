<?php
namespace Gyman\Domain\Tests\Unit\Handler;

use DateTime;
use Gyman\Domain\Command\CreateMemberCommand;
use Gyman\Domain\Handler\CreateMemberHandler;
use Gyman\Domain\Model\EmailAddress;
use Gyman\Domain\Repository\InMemoryMemberRepository;
use Mockery as m;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CreateMemberHandlerTest extends \PHPUnit_Framework_TestCase
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
        $testFile = '/tmp/' . md5(microtime());
        file_put_contents($testFile, '');

        $repository = new InMemoryMemberRepository();

        $md5 = md5('new-hash');

        $command = new CreateMemberCommand();
        $command->firstname = 'Grzegorz';
        $command->lastname  = 'Kaszuba';
        $command->birthdate = new DateTime('27.09.1984');
        $command->gender    = 'male';
        $command->zipcode   = '81-353';
        $command->phone     = '604 411 089';
        $command->email     = 'andrzej@gazeta.pl';
        $command->barcode   = 'new-barcode';
        $command->belt      = 'purple';
        $command->notes     = 'updated note';
        $command->foto      = $md5;
        $command->uploadFile = new UploadedFile(
            $testFile,
            'original_name.jpg',
            'image/jpg',
            null,
            null,
            true
        );

        $handler = new CreateMemberHandler($repository, '/tmp');

        $handler->handle($command);

        $member = $repository->findOneByEmailAddress(new EmailAddress('andrzej@gazeta.pl'));

        $this->assertEquals($member->details()->firstname(), 'Grzegorz');
        $this->assertEquals($member->details()->lastname(), 'Kaszuba');
        $this->assertEquals($member->details()->birthdate()->format('d.m.Y'), '27.09.1984');
        $this->assertEquals($member->details()->gender(), 'male');
        $this->assertEquals($member->details()->zipcode(), '81-353');
        $this->assertEquals($member->details()->phone(), '604 411 089');
        $this->assertEquals($member->email()->email(), 'andrzej@gazeta.pl');
        $this->assertEquals($member->details()->barcode()->barcode(), 'new-barcode');
        $this->assertEquals($member->details()->belt()->color(), 'purple');
        $this->assertEquals($member->details()->notes(), 'updated note');
        $this->assertNotEquals($member->details()->foto()->foto(), $md5);
    }
}
