<?php

declare(strict_types=1);

namespace Gyman\Application\Factory;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Application\Command\CreateMemberCommand;
use Gyman\Domain\Member;
use Gyman\Domain\Member\Details;
use Gyman\Domain\Member\Details\Barcode;
use Gyman\Domain\Member\Details\Belt;
use Gyman\Domain\Member\Details\Foto;
use Gyman\Domain\Member\EmailAddress;

/**
 * Class MemberFactory.
 */
final class MemberFactory implements MemberFactoryInterface
{
    /**
     * @param $params
     * @param mixed $array
     *
     * @return Member
     */
    public static function createFromArray($array)
    {
        $template = [
            'id'               => null,
            'email'            => null,
            'firstname'        => null,
            'lastname'         => null,
            'birthdate'        => null,
            'phone'            => null,
            'notes'            => null,
            'foto'             => null,
            'zipcode'          => null,
            'gender'           => null,
            'belt'             => null,
            'barcode'          => null,
            'starred'          => null,
            'sections'         => new ArrayCollection(),
            'vouchers'         => new ArrayCollection(),
            'entries'          => new ArrayCollection(),
            'current_voucher'  => null,
            'last_entry'       => null,
        ];

        $array = array_merge($template, $array);

        $member = new Member(
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
            $array['sections'],
            $array['vouchers'] instanceof ArrayCollection ? $array['vouchers'] : new ArrayCollection($array['vouchers']),
            $array['entries'] instanceof ArrayCollection ? $array['entries'] : new ArrayCollection($array['entries']),
            $array['current_voucher'],
            $array['last_entry']
        );

        return $member;
    }

    /**
     * @return Member
     */
    public static function create()
    {
        return self::createFromArray([]);
    }

    /**
     * @param CreateMemberCommand $command
     *
     * @return Member
     */
    public static function createFromCreateMemberCommand(CreateMemberCommand $command)
    {
        return static::createFromArray([
            'email'            => $command->email,
            'firstname'        => $command->firstname,
            'lastname'         => $command->lastname,
            'birthdate'        => $command->birthdate,
            'phone'            => $command->phone,
            'notes'            => $command->notes,
            'foto'             => $command->foto,
            'zipcode'          => $command->zipcode,
            'gender'           => $command->gender,
            'belt'             => $command->belt,
            'barcode'          => $command->barcode,
            'starred'          => $command->starred,
            'sections'         => $command->sections,
        ]);
    }
}
