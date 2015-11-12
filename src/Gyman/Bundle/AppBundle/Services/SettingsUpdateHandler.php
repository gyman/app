<?php
namespace Gyman\Bundle\AppBundle\Services;

use Dende\Calendar\Domain\Calendar;
use Gyman\Bundle\AppBundle\Entity\Section;
use Gyman\Bundle\AppBundle\Entity\SectionRepository;
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
     * SettingsUpdateHandler constructor.
     * @param SectionRepository $sectionRepository
     */
    public function __construct(SectionRepository $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
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
    }
}