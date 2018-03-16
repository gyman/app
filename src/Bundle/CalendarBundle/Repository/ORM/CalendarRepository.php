<?php
namespace Gyman\Bundle\CalendarBundle\Repository\ORM;

use Gyman\Calendar\Application\Repository\CalendarRepositoryInterface;
use Gyman\Calendar\Domain\Calendar;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;

/**
 * Class CalendarRepository.
 */
class CalendarRepository extends EntityRepository implements CalendarRepositoryInterface
{
    public function update(Calendar $calendar)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param Calendar $calendar
     */
    public function insert(Calendar $calendar)
    {
        $em = $this->getEntityManager();
        $em->persist($calendar);
        $em->flush();
    }

    public function remove(Calendar $calendar)
    {
        $em = $this->getEntityManager();
        $em->remove($calendar);
        $em->flush();
    }

    public function findAll() : ArrayCollection
    {
        return new ArrayCollection(parent::findAll());
    }

    /**
     * @param string $calendarId
     *
     * @return Calendar|null
     */
    public function findOneByCalendarId(string $calendarId): Calendar
    {
        return $this->findOneBy(['id' => $calendarId]);
    }
}
