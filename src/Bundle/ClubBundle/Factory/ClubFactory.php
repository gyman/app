<?php
namespace Gyman\Bundle\ClubBundle\Factory;

use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\ClubBundle\Entity\Database;
use Gyman\Bundle\ClubBundle\Entity\Details;
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
        $params = array_merge($params, [
            "name" => '',
            "subdomain" => '',
            "details" => [
                "address" => "",
                "zipcode" => "",
                "city" => "",
                "country" => "",
                "phone_number" => "",
                "email_address" => "",
                "opened_from" => "",
                "opened_till" => "",
                "logo" => "",
                "about" => "",
                "account_number" => "",
            ],
            "database" => [
                "name" => "",
                "user" => "",
                "password" => "",
                "host" => "",
            ]
        ]);

        return new Club(
            null,
            $params['name'],
            new Subdomain($params['subdomain']),
            new Database(
                $params['database']['name'],
                $params['database']['user'],
                $params['database']['password'],
                $params['database']['host']
            ),
            new Details(
                $params['details']['address'],
                $params['details']['zipcode'],
                $params['details']['city'],
                $params['details']['country'],
                $params['details']['phone_number'],
                $params['details']['email_address'],
                $params['details']['opened_from'],
                $params['details']['opened_till'],
                $params['details']['logo'],
                $params['details']['about'],
                $params['details']['account_number']
            )
        );
    }
}
