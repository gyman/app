<?php
namespace Gyman\Application\Tests\Unit\Handler;

use DateTime;
use Gyman\Bundle\AppBundle\Factory\MemberFactory;
use Gyman\Application\Command\UpdateMemberCommand;
use Gyman\Application\Handler\UpdateMemberHandler;
use Mockery as m;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UpdateMemberHandlerTest extends \PHPUnit_Framework_TestCase
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

        $member = MemberFactory::createFromArray([
            'firstname' => 'Andrzej',
            'lastname'  => 'Kaszuba',
            'birthdate' => '18.01.1955',
            'gender'    => 'male',
            'zipcode'   => '81-353',
            'phone'     => '600 000 000',
            'email'     => 'andrzej@gazeta.pl',
            'barcode'   => '123456789',
            'belt'      => 'white',
            'notes'     => 'some admin notes',
            'foto'      => md5('some-hash'),
        ]);

        $repository = m::mock('Gyman\Application\Repository\MemberRepositoryInterface');
        $repository->shouldReceive('findOneById')->once()->andReturn($member);
        $repository->shouldReceive('insert')->with($member)->once()->andReturn($member);

        $md5 = md5('new-hash');

        $command = new UpdateMemberCommand();
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
            null
        );

        $dispatcher = new EventDispatcher();

        $uploadHandler = m::mock('Gyman\Application\Handler\UploadMemberFotoHandler');
        $uploadHandler->shouldReceive('handle')->once()->with($command)->andReturnNull();

        $handler = new UpdateMemberHandler($repository, $uploadHandler, $dispatcher);

        $handler->handle($command);

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
    }
}
