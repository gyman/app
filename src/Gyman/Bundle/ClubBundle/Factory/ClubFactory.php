<?php

namespace Gyman\Bundle\ClubBundle\Factory;

use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\ClubBundle\Entity\Database;
use Gyman\Bundle\ClubBundle\Entity\Subdomain;

/**
 * Class ClubFactory
 * @package Gyman\Bundle\ClubBundle
 */
class ClubFactory
{
    /**
     * @param $params
     * @return Club
     */
    public static function createFromArray($params)
    {
        return new Club(
            null,
            $params['name'],
            $params['sections'],
            $params['owners'],
            new Subdomain($params['subdomain']),
            new Database(
                $params['database']['name'],
                $params['database']['user'],
                $params['database']['password']
            )
        );
    }
}
