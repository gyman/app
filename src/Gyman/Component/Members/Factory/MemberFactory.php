<?php

namespace Gyman\Component\Members\Factory;

use DateTime;
use Gyman\Component\Members\Model\Barcode;
use Gyman\Component\Members\Model\Belt;
use Gyman\Component\Members\Model\Details;
use Gyman\Component\Members\Model\EmailAddress;
use Gyman\Component\Members\Model\Foto;
use Gyman\Component\Members\Model\Member;

/**
 * Class MemberFactory
 * @package Gyman\Component\Members
 */
final class MemberFactory implements MemberFactoryInterface
{
    private static $template = [
        'email'           => null,
        'firstname'       => null,
        'lastname'        => null,
        'birthdate'       => null,
        'phone'           => null,
        'notes'           => null,
        'foto'            => null,
        'zipcode'         => null,
        'gender'          => null,
        'belt'            => null,
        'barcode'         => null,
        'starred'         => null,
        'sections'        => [],
        'vouchers'        => [],
        'entries'         => [],
        'current_voucher' => null,
        'last_entry'      => null,
    ];

    /**
     * @param $params
     * @return Member
     */
    public static function createFromArray($array)
    {
        $array = array_merge(self::$template, $array);

        return new Member(
            new EmailAddress($array['email']),
            new Details(
                $array['firstname'],
                $array['lastname'],
                new DateTime($array['birthdate']),
                $array['phone'],
                $array['notes'],
                new Foto($array['foto']),
                $array['zipcode'],
                $array['gender'],
                new Belt($array['belt']),
                new Barcode($array['barcode']),
                $array['starred']
            ),
            $array['sections'],
            $array['vouchers'],
            $array['entries'],
            $array['current_voucher'],
            $array['last_entry']
        );
    }
}
