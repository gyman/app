<?php

namespace Gyman\Bundle\EntriesBundle\Twig;

use Gyman\Bundle\EntriesBundle\Entity\Entry;
use Gyman\Bundle\ScheduleBundle\Entity\Activity;
use Gyman\Bundle\ScheduleBundle\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Translation\Translator;
use Symfony\Component\Translation\TranslatorInterface;

class EntryExtension extends \Twig_Extension
{
    /**
     * @var Translator
     */
    private $translator;

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('activity_label', array($this, 'activityLabelFilter')),
        );
    }

    public function activityLabelFilter(Entry $entry)
    {
        /**
         * @var Activity $activity
         */
        $occurence = $entry->getOccurence();

        if (!$occurence) {
            return;
        }

        /**
         * @var Event $event
         */
        $event = $occurence->getEvent();
        $activity = $event->getActivity();

        return $activity->getName();
    }

    public function getName()
    {
        return 'entry_extension';
    }

    /**
     * @param Translator $translator
     */
    public function setTranslator(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }
}
