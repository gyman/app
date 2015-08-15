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
    /**
     * @param $params
     * @return Member
     */
    static public function createFromArray($array)
    {
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
                false
            ),
            $array['sections'],
            $array['vouchers'],
            $array['entries'],
            $array['current_voucher'],
            $array['last_entry']
        );
    }
}