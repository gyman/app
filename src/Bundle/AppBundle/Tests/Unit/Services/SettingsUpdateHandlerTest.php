<?php
namespace Gyman\Bundle\AppBundle\Tests\Unit\Services;

use Dende\Calendar\Domain\Calendar;
use Gyman\Bundle\AppBundle\Repository\SectionRepository;
use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\ClubBundle\Entity\ClubRepository;
use Gyman\Bundle\ClubBundle\Entity\Details;
use Gyman\Domain\Section;
use Gyman\Bundle\AppBundle\Services\SettingsUpdateHandler;
use Gyman\Application\Command\UpdateSettingsCommand;
use Gyman\Application\Handler\UploadClubLogoHandler;
use Mockery as m;

/**
 * Class SettingsUpdateHandlerTest
 * @package Gyman\Bundle\AppBundle\Tests\Unit\Services
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
    public function testHandle()
    {
        $sectionOld1 = new Section(111, 'will-be-left-1', new Calendar(null, 'will-be-left-1'));
        $sectionOld2 = new Section(112, 'will-be-left-2', new Calendar(null, 'will-be-left-2'));
        $sectionOld3 = new Section(113, 'will-be-left-3', new Calendar(null, 'will-be-left-3'));

        $sectionNew1 = new Section(null, 'added-1', new Calendar(null, 'added-1'));
        $sectionNew2 = new Section(null, 'added-2', new Calendar(null, 'added-2'));

        $sectionToRemove1 = new Section(333, 'to-remove-1', new Calendar(null, 'to-remove-1'));
        $sectionToRemove2 = new Section(334, 'to-remove-2', new Calendar(null, 'to-remove-2'));
        $sectionToRemove3 = new Section(335, 'to-remove-3', new Calendar(null, 'to-remove-3'));

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

        $sectionRepositoryMock = m::mock(SectionRepository::class);
        $sectionRepositoryMock->shouldReceive('findAll')->once()->andReturn($existingSections);
        $sectionRepositoryMock->shouldReceive('remove')->once()->with($sectionToRemove1);
        $sectionRepositoryMock->shouldReceive('remove')->once()->with($sectionToRemove2);
        $sectionRepositoryMock->shouldReceive('remove')->once()->with($sectionToRemove3);

        $sectionRepositoryMock->shouldReceive('update')->once()->with($sectionOld1);
        $sectionRepositoryMock->shouldReceive('update')->once()->with($sectionOld2);
        $sectionRepositoryMock->shouldReceive('update')->once()->with($sectionOld3);

        $sectionRepositoryMock->shouldReceive('insert')->once()->with($sectionNew1);
        $sectionRepositoryMock->shouldReceive('insert')->once()->with($sectionNew2);

        $details = new Details();
        $name = "Club";

        $command = new UpdateSettingsCommand();
        $command->sections = $newSections;
        $command->details = $details;
        $command->name = $name;

        $club = m::mock(Club::class);
        $club->shouldReceive("setDetails")->once()->with($details);
        $club->shouldReceive("updateName")->once()->with($name);

        $clubRepositoryMock = m::mock(ClubRepository::class);
        $clubRepositoryMock->shouldReceive("update")->once()->with($club);

        $logoUploadHandlerMock = m::mock(UploadClubLogoHandler::class);
        $logoUploadHandlerMock->shouldReceive("handle")->once()->with($command);

        $service = new SettingsUpdateHandler($sectionRepositoryMock, $clubRepositoryMock, $club, $logoUploadHandlerMock);

        $service->handle($command);

        $this->assertInstanceOf('Dende\Calendar\Domain\Calendar', $sectionNew1->calendar());
        $this->assertInstanceOf('Dende\Calendar\Domain\Calendar', $sectionNew2->calendar());
    }
}
