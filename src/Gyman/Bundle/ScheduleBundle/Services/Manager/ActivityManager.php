<?php

namespace Gyman\Bundle\ScheduleBundle\Services\Manager;

use Gyman\Bundle\DefaultBundle\Services\Manager\BaseManager;

class ActivityManager extends BaseManager
{
    /**
     * Gets all activities as id => name array
     * @return array
     */
    public function getActivitiesAssoc()
    {
        $repository = $this->getRepository();

        $query = $repository->getActivitiesQuery();

        $data =  $query->getQuery()->execute();

        $result = array();

        foreach ($data as $item) {
            $result[$item->getId()] = $item->getName();
        }

        return $result;
    }
}
