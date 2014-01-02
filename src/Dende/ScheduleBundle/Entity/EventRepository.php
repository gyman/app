<?php

namespace Dende\ScheduleBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * EventRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EventRepository extends EntityRepository {

    public function getCurrentEvents() {
        $dayOfWeek = strtolower(date('l'));
        $hour = date('H:i');
        
        $queryBuilder = $this->createQueryBuilder("e")
                ->where("e.dayOfWeek = :day")
                ->andWhere("e.startHour <= :hour")
                ->andWhere("e.endHour >= :hour")
                ->setParameters(array(
                    "day" => $dayOfWeek,
                    "hour" => $hour
                ));
        
        $query = $queryBuilder->getQuery();
        
        return $query->execute();                
    }

}
