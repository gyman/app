<?php
namespace Gyman\Bundle\AppBundle\Services;

use Dende\Calendar\Domain\Calendar;
use Gyman\Bundle\AppBundle\Entity\Section;
use Gyman\Bundle\AppBundle\Entity\SectionRepository;
use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\ClubBundle\Entity\ClubRepository;
use Gyman\Domain\Command\UpdateSettingsCommand;

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
     * SettingsUpdateHandler constructor.
     * @param SectionRepository $sectionRepository
     * @param ClubRepository $clubRepository
     */
    public function __construct(SectionRepository $sectionRepository, ClubRepository $clubRepository, Club $currentClub)
    {
        $this->sectionRepository = $sectionRepository;
        $this->clubRepository = $clubRepository;
        $this->club = $currentClub;
    }

    /**
     * @param UpdateSettingsCommand $command
     */
    public function handle(UpdateSettingsCommand $command){

        $existingSections = $this->sectionRepository->findAll();

        foreach($existingSections as $existing) {
            if(!in_array($existing, $command->sections)) {
                $this->sectionRepository->remove($existing);
            }
        }

        foreach($command->sections as $section) {
            if(is_null($section->id())) {
                $section->setCalendar(new Calendar(null, $section->title()));
                $this->sectionRepository->insert($section);
            } else {
                $this->sectionRepository->update($section);
            }
        }

        $this->club->setDetails($command->details);

        $this->clubRepository->update($this->club);
    }
}