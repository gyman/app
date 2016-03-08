<?php
namespace Gyman\Application\Factory;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Domain\Member\Details\Barcode;
use Gyman\Domain\Member\Details\Belt;
use Gyman\Domain\Member\Details;
use Gyman\Domain\Member\EmailAddress;
use Gyman\Domain\Member\Details\Foto;
use Gyman\Domain\Member;

/**
 * Class MemberFactory
 * @package Gyman\Domain
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
