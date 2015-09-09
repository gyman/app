<?php
namespace Gyman\Component\Members\Factory;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
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
    /**
     * @param $params
     * @return Member
     */
    public static function createFromArray($array)
    {
        $template = [
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
            'sections'        => new ArrayCollection(),
            'vouchers'        => new ArrayCollection(),
            'entries'         => new ArrayCollection(),
            'current_voucher' => null,
            'last_entry'      => null,
        ];

        $array = array_merge($template, $array);

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
            $array['sections'] instanceof ArrayCollection ? $array['sections'] : new ArrayCollection($array['sections']),
            $array['vouchers'] instanceof ArrayCollection ? $array['vouchers'] : new ArrayCollection($array['vouchers']),
            $array['entries'] instanceof ArrayCollection ? $array['entries'] : new ArrayCollection($array['entries']),
            $array['current_voucher'],
            $array['last_entry']
        );
    }

    /**
     * @return Member
     */
    public static function create()
    {
        return self::createFromArray([]);
    }
}
