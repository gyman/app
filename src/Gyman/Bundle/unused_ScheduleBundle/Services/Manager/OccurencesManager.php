<?php
namespace Gyman\Bundle\ScheduleBundle\Services\Manager;

use Gyman\Bundle\BaseBundle\EntityManager\BaseManager;
use Gyman\Bundle\ScheduleBundle\Entity as Entity;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Form\Form;

/**
 * Class OccurrencesManager
 * @package Gyman\Bundle\ScheduleBundle\Services\Manager
 *
 * @todo: refactor and move form stuff to FormHandler
 */
class OccurencesManager extends BaseManager
{
    /**
     *
     * @var Form
     */
    private $form;

    /**
     *
     * @var Router
     */
    private $router;

    /**
     *
     * @var array
     */
    private $weekdays = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];

    /**
     *
     * @var array
     */
    private $colors = [
        '#CC3366', '#D8648B', '#64D8B1', '#33CC99',
        '#CC33B3', '#9933CC', '#4D33CC', '#CC4D33',
        '#E495AF', '#3366CC', '#33B3CC', '#66CC33',
    ]; // </editor-fold>

    /**
     *
     * @var Entity\Occurrence
     */
    private $occurrence;

    /**
     * @return Entity\Occurrence
     */
    public function getOccurrence()
    {
        return $this->occurrence;
    }

    /**
     *
     * @param  \Gyman\Bundle\ScheduleBundle\Entity\Occurrence           $occurrence
     * @return \Gyman\Bundle\ScheduleBundle\Services\OccurrencesManager
     */
    public function setOccurrence(Entity\Occurrence $occurrence)
    {
        $this->occurrence = $occurrence;

        return $this;
    }

    public function getForm()
    {
        return $this->form;
    }

    /**
     *
     * @param  \Symfony\Component\Form\Form                            $form
     * @return \Gyman\Bundle\ScheduleBundle\Services\OccurrencesManager
     */
    public function setForm(Form $form)
    {
        $this->form = $form;

        return $this;
    }

    /**
     *
     * @return Router
     */
    public function getRouter()
    {
        return $this->router;
    }

    public function setRouter(Router $router)
    {
        $this->router = $router;

        return $this;
    }

    /**
     *
     * @param array
     * @return array
     */
    public function prepareOccurrences(array $events = [])
    {
        $eventsArray = [];
        $countColors = count($this->colors);

        foreach ($events as $i => $event) {
            $occurrences = $event->getOccurrences();
            foreach ($occurrences as $j => $occurrence) {
                $description = sprintf('%s', $event->getActivity()->getName());
                $duration = new \DateInterval(sprintf('PT%dM', $occurrence->getDuration()));

                $eventObject = [
                    'id'            => $occurrence->getEvent()->getId(),
                    'title'         => $description,
                    'allDay'        => false,
                    'start'         => $occurrence->getStartDate()->format('c'),
                    'end'           => $occurrence->getStartDate()->add($duration)->format('c'),
                    'color'         => $this->colors[$i % $countColors],
                    'textColor'     => '#000000',
                    'type'          => $event->getType(),
                    'occurrence_id' => $occurrence->getId(),
//                    "url"          => $this->getRouter()->generate("_events_edit", ["occurrence" => $occurrence->getId()])
                ];

                array_push($eventsArray, $eventObject);
            }
        }

        return $eventsArray;
    }
}
