<?php
namespace Gyman\Domain\Command;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\AppBundle\Entity\Section;
use Gyman\Domain\Model\Member;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class UpdateMemberCommand
 * @package Gyman\Domain\Command
 */
class UpdateMemberCommand implements MemberCommandInterface
{
    /**
     * @var string
     */
    public $firstname;

    /**
     * @var string
     */
    public $lastname;

    /**
     * @var DateTime
     */
    public $birthdate;

    /**
     * @var string
     */
    public $gender;

    /**
     * @var string
     */
    public $zipcode;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $barcode;

    /**
     * @var string
     */
    public $belt;

    /**
     * @var string
     */
    public $notes;

    /**
     * @var string
     */
    public $foto;

    /**
     * @var
     */
    public $fotoData;

    /**
     * @var bool
     */
    public $starred;

    /**
     * @var UploadedFile
     */
    public $uploadFile;

    /**
     * @var integer
     */
    public $id;

    /**
     * @var Section[]|ArrayCollection
     */
    public $sections = [];

    /**
     * @param Member $member
     * @return UpdateMemberCommand
     */
    public static function createFromMember(Member $member)
    {
        $command = new self();
        $command->id = $member->id();
        $command->firstname = $member->details()->firstname();
        $command->lastname = $member->details()->lastname();
        $command->birthdate = $member->details()->birthdate();
        $command->gender = $member->details()->gender();
        $command->zipcode = $member->details()->zipcode();
        $command->phone = $member->details()->phone();
        $command->email = $member->email()->email();
        $command->barcode = $member->details()->barcode()->barcode();
        $command->belt = $member->details()->belt()->color();
        $command->notes = $member->details()->notes();
        $command->foto = $member->details()->foto()->foto();
        $command->starred = $member->details()->isStarred();
        $command->sections = $member->sections();

        return $command;
    }
}
