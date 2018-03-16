<?php
namespace Gyman\Bundle\CalendarBundle\Service;

use DateTime;
use Gyman\Calendar\Application\Repository\OccurrenceRepositoryInterface;
use Gyman\Calendar\Domain\Calendar;
use Gyman\Calendar\Domain\Calendar\Event\Occurrence;
use Gyman\Calendar\Domain\Calendar\Event\OccurrenceInterface;
use Symfony\Bundle\FrameworkBundle\Routing\Router;

/**
 * Class OccurrenceProvider.
 */
final class OccurrencesProvider
{
    private $colors = [
        'red',
        'blue',
        'green',
        'orange',
        'yellow',
        'light-blue',
    ];

    /**
     * @var OccurrenceRepositoryInterface
     */
    private $occurrenceRepository;

    /**
     * @var Router
     */
    private $router;

    /**
     * @var string
     */
    private $eventEditRoute;

    /**
     * @var bool
     */
    private $generateRoutes = true;

    /**
     * OccurrenceProvider constructor.
     *
     * @param OccurrenceRepositoryInterface $occurrenceRepository
     * @param Router                        $router
     * @param $routeName
     */
    public function __construct(OccurrenceRepositoryInterface $occurrenceRepository, Router $router, $routeName)
    {
        $this->occurrenceRepository = $occurrenceRepository;
        $this->router = $router;
        $this->eventEditRoute = $routeName;
    }

    /**
     * @param Calendar $calendar
     * @param DateTime $start
     * @param DateTime $end
     */
    public function get(Calendar $calendar, DateTime $start, DateTime $end)
    {
        $collection = $this->occurrenceRepository->findByCalendar($calendar, $start, $end);

        $collection = array_map([$this, 'convert'], $collection);

        return $collection;
    }

    /**
     * @param DateTime $start
     * @param DateTime $end
     */
    public function getAll(DateTime $start, DateTime $end, $generateRoutes = true)
    {
        $this->generateRoutes = $generateRoutes;

        $collection = $this->occurrenceRepository->findByPeriod($start, $end);

        $collection = array_map([$this, 'convert'], $collection);

        return $collection;
    }

    /**
     * @param Occurrence $occurrence
     *
     * @return array
     */
    public function convert(OccurrenceInterface $occurrence)
    {
        $options = [
            'title'           => $occurrence->event()->title(),
            'start'           => $occurrence->startDate()->format('Y-m-d H:i:s'),
            'end'             => $occurrence->endDate()->format('Y-m-d H:i:s'),
            'backgroundColor' => $this->colors[array_rand($this->colors)],
            'textColor'       => 'black',
            'editable'        => true,
            'occurrenceId'    => $occurrence->id(),
        ];

        if ($this->generateRoutes) {
            $options['url'] = $this->router->generate($this->eventEditRoute, ['occurrenceId' => $occurrence->id()]);
        }

        return $options;
    }
}
