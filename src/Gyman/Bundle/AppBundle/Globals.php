<?php
namespace Gyman\Bundle\AppBundle;

use Gyman\Bundle\ClubBundle\Entity\Subdomain;

/**
 * Class Globals
 *
 * OK, I know. This one earned me a huge kick in the balls. But hey, life is not perfect. Neither this code is ;)
 *
 * @package Gyman\Bundle\AppBundle
 */
final class Globals
{
    /**
     * @var
     */
    protected static $defaultDateTimeFormat = 'Y.m.d H:i:s';

    /**
     * @var string
     */
    protected static $defaultDateFormat = 'Y.m.d';

    /**
     * @var string
     */
    protected static $galleryPath;

    /**
     * @var Subdomain
     */
    protected static $subdomain;

    /**
     * @var string
     */
    protected static $galleryDir = '/uploads/gallery/';

    /**
     * @var string
     */
    protected static $noImage = '/bundles/gymanapp/images/no-profile.gif';

    protected static $compareChoices = [
        'eq'         => 'równy',
        'lt'         => 'wcześniej niż',
        'gt'         => 'później niż',
        'between'    => 'pomiędzy',
        'notBetween' => 'poza',
        'today'      => 'dzisiaj',
        'yesterday'  => 'wczoraj',
        'thisWeek'   => 'ten tydzień',
        'lastWeek'   => 'poprzedni tydzień',
        'thisMonth'  => 'ten miesiąc',
        'lastMonth'  => 'poprzedni miesiąc',
        'thisYear'   => 'ten rok',
        'lastYear'   => 'poprzedni rok',
    ];
    protected static $filtersLabels = [
        'Activities'       => 'Zajęcia',
        'Age'              => 'Wiek',
        'Belt'             => 'Kolor pasa',
        'CheckedIn'        => 'Obecny w klubie',
        'CurrentVoucher'   => 'Aktualny karnet',
        'EntryDate'        => 'Data wejścia',
        'EntryType'        => 'Płatność za wejście',
        'Gender'           => 'Płeć',
        'Member'           => 'Uczestnik',
        'Price'            => 'Płatność',
        'RegistrationDate' => 'Data rejestracji',
        'SearchName'       => 'Imię/nazwisko',
        'Starred'          => 'Ulubiony',
        'VoucherStart'     => 'Data rozpoczęcia karnetu',
        'VoucherEnd'       => 'Data zakończenia karnetu',
    ];

    public static function getGalleryDir()
    {
        return self::$galleryDir;
    }

    public static function setGalleryDir($galleryDir)
    {
        self::$galleryDir = $galleryDir;
    }

    /**
     * @param mixed $galleryPath
     */
    public static function setGalleryPath($galleryPath)
    {
        self::$galleryPath = $galleryPath;
    }

    /**
     * @return mixed
     */
    public static function getGalleryPath()
    {
        return self::$galleryPath;
    }

    public static function getNoImage()
    {
        return self::$noImage;
    }

    public static function setNoImage($noImage)
    {
        self::$noImage = $noImage;
    }

    public static function getFilterLabel($class)
    {
        return self::$filtersLabels[$class];
    }

    /**
     * Adds relative to DOCUMENT_ROOT path to file
     * @param  string $string
     * @return string
     */
    public static function applyGalleryPath(string $string) : string
    {
        if (self::checkIfImageExists($string)) {
            return self::getGalleryPath() . $string;
        }

        return self::getNoImage();
    }

    /**
     * Adds absolute phisical path to file
     * @param $string
     * @return string
     */
    public static function applyFileDir($string)
    {
        return self::$galleryDir . $string;
    }

    public static function checkIfImageExists($string)
    {
        $file = self::getGalleryDir() . $string;

        return is_file($file) && file_exists($file);
    }

    public static function getCompareChoices()
    {
        return self::$compareChoices;
    }

    public static function parseClassname($object)
    {
        return implode('', array_slice(explode('\\', get_class($object)), -1));
    }

    /**
     * @param $format
     */
    public static function setDefaultDateFormat($format)
    {
        self::$defaultDateFormat = $format;
    }

    public static function getDefaultDateTimeFormat()
    {
        return self::$defaultDateTimeFormat;
    }

    public static function setDefaultDateTimeFormat($format)
    {
        self::$defaultDateTimeFormat = $format;
    }

    /**
     * @return string
     */
    public static function getDefaultDateFormat()
    {
        return self::$defaultDateFormat;
    }

    public static function getDefaultCurrency()
    {
        return 'PLN';
    }

    public static function setSubdomain(Subdomain $subdomain) : void
    {
        self::$subdomain = $subdomain;
    }

    public static function getSubdomain() : Subdomain
    {
        return self::$subdomain;
    }
}
