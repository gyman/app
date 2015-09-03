<?php
namespace Gyman\Bundle\MembersBundle\Factory;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\MembersBundle\DTO\NewMember;
use Gyman\Bundle\MembersBundle\Entity\Barcode;
use Gyman\Bundle\MembersBundle\Entity\Belt;
use Gyman\Bundle\MembersBundle\Entity\Details;
use Gyman\Bundle\MembersBundle\Entity\EmailAddress;
use Gyman\Bundle\MembersBundle\Entity\Foto;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Component\Members\Factory\MemberFactoryInterface;

/**
 * Class MemberFactory
 * @package Gyman\Bundle\MembersBundle\Factory
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
                $array['birthdate'] instanceof DateTime ? $array['birthdate'] : new DateTime($array['birthdate']),
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
     * @param NewMember $dto
     * @return Member
     */
    public static function createFromDto($dto)
    {
        return self::createFromArray(get_object_vars($dto));
    }
}
