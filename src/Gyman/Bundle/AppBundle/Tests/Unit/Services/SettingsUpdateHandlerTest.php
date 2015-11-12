<?php
namespace Gyman\AppBundle\Tests\Unit\Services;

use Gyman\Bundle\AppBundle\Entity\Section;
use Gyman\Bundle\AppBundle\Services\SettingsUpdateHandler;
use Gyman\Domain\Command\UpdateSettingsCommand;
use Mockery as m;

/**
 * Class SettingsUpdateHandlerTest
 * @package Gyman\AppBundle\Tests\Unit\Services
 */
class SettingsUpdateHandlerTest extends \PHPUnit_Framework_TestCase
{

    public function tearDown()
    {
        m::close();
    }

    /**
     * @test
     */
    public function testHandle(){
        $sectionOld1 = new Section(111, 'will-be-left-1');
        $sectionOld2 = new Section(112, 'will-be-left-2');
        $sectionOld3 = new Section(113, 'will-be-left-3');

        $sectionNew1 = new Section(null, 'added-1');
        $sectionNew2 = new Section(null, 'added-1');

        $sectionToRemove1 = new Section(333, 'to-remove-1');
        $sectionToRemove2 = new Section(334, 'to-remove-2');
        $sectionToRemove3 = new Section(335, 'to-remove-3');

        $existingSections = [
            $sectionOld1,
            $sectionOld2,
            $sectionOld3,
            $sectionToRemove1,
            $sectionToRemove2,
            $sectionToRemove3
        ];

        $newSections = [
            $sectionOld1,
            $sectionOld2,
            $sectionOld3,
            $sectionNew1,
            $sectionNew2
        ];

        $repositoryMock = m::mock('Gyman\Bundle\AppBundle\Entity\SectionRepository');
        $repositoryMock->shouldReceive('findAll')->once()->andReturn($existingSections);
        $repositoryMock->shouldReceive('remove')->once()->with($sectionToRemove1);
        $repositoryMock->shouldReceive('remove')->once()->with($sectionToRemove2);
        $repositoryMock->shouldReceive('remove')->once()->with($sectionToRemove3);

        $repositoryMock->shouldReceive('update')->once()->with($sectionOld1);
        $repositoryMock->shouldReceive('update')->once()->with($sectionOld2);
        $repositoryMock->shouldReceive('update')->once()->with($sectionOld3);

        $repositoryMock->shouldReceive('insert')->once()->with($sectionNew1);
        $repositoryMock->shouldReceive('insert')->once()->with($sectionNew2);

        $command = new UpdateSettingsCommand();
        $command->sections = $newSections;

        $service = new SettingsUpdateHandler($repositoryMock);

        $service->handle($command);

        $this->assertInstanceOf('Dende\Calendar\Domain\Calendar', $sectionNew1->calendar());
        $this->assertInstanceOf('Dende\Calendar\Domain\Calendar', $sectionNew2->calendar());
    }
}