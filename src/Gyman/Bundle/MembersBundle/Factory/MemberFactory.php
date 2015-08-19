<?php

namespace Gyman\Bundle\MembersBundle\Factory;

use DateTime;
use Gyman\Bundle\MembersBundle\Entity\Barcode;
use Gyman\Bundle\MembersBundle\Entity\Belt;
use Gyman\Bundle\MembersBundle\Entity\Details;
use Gyman\Bundle\MembersBundle\Entity\EmailAddress;
use Gyman\Bundle\MembersBundle\Entity\Foto;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Component\Members\Factory\MemberFactoryInterface;

final class MemberFactory implements MemberFactoryInterface
{
    /**
     * @param $params
     * @return Member
     */
    public static function createFromArray($array)
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
