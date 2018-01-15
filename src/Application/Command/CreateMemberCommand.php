<?php
namespace Gyman\Application\Command;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Domain\Section;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class CreateMemberCommand
 * @package Gyman\Application\Command
 */
final class CreateMemberCommand implements MemberCommandInterface
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
     * @var string
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

}
