<?php
namespace Gyman\Bundle\AppBundle\Services;

use Gyman\Domain\Calendar;
use Gyman\Bundle\AppBundle\Repository\SectionRepository;
use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\ClubBundle\Entity\ClubRepository;
use Gyman\Application\Command\UpdateSettingsCommand;
use Gyman\Application\Handler\UploadClubLogoHandler;

/**
 * Class SettingsUpdateHandler
 * @package Gyman\Bundle\AppBundle\Services
 */
class SettingsUpdateHandler
{
    /**
     * @var SectionRepository
     */
    private $sectionRepository;

    /**
     * @var ClubRepository
     */
    private $clubRepository;

    /**
     * @var Club
     */
    private $club;

    /**
     * @var UploadClubLogoHandler
     */
    private $uploadHandler;

    /**
     * SettingsUpdateHandler constructor.
     * @param SectionRepository $sectionRepository
     * @param ClubRepository $clubRepository
     * @param Club $currentClub
     * @param UploadClubLogoHandler $uploadHandler
     */
    public function __construct(SectionRepository $sectionRepository, ClubRepository $clubRepository, Club $currentClub, UploadClubLogoHandler $uploadHandler)
    {
        $this->sectionRepository = $sectionRepository;
        $this->clubRepository = $clubRepository;
        $this->club = $currentClub;
        $this->uploadHandler = $uploadHandler;
    }

    /**
     * @param UpdateSettingsCommand $command
     */
    public function handle(UpdateSettingsCommand $command)
    {
        $existingSections = $this->sectionRepository->findAll();

        foreach ($existingSections as $existing) {
            if (!in_array($existing, $command->sections)) {
                $this->sectionRepository->remove($existing);
            }
        }

        foreach ($command->sections as $section) {
            if (is_null($section->id())) {
                $section->setCalendar(new Calendar(null, $section->title()));
                $this->sectionRepository->insert($section);
            } else {
                $section->calendar()->updateTitle($section->title());
                $this->sectionRepository->update($section);
            }
        }

        $this->uploadHandler->handle($command);

        $this->club->setDetails($command->details);
        $this->club->updateName($command->name);
        $this->clubRepository->update($this->club);
    }
}
