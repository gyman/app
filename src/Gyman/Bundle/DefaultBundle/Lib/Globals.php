<?php
namespace Gyman\Bundle\DefaultBundle\Lib;

/**
 * Class Globals
 * @package Gyman\Bundle\DefaultBundle\Lib
 */
class Globals
{
    /**
     * @var
     */
    public static $defaultDateTimeFormat = 'Y.m.d H:i:s';
    /**
     * @var string
     */
    public static $defaultDateFormat = 'Y.m.d';

    /**
     * @var
     */
    protected static $galleryPath;

    protected static $galleryDir = '/uploads/gallery/';
    protected static $noImage;
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
     *
     * @param  string $string
     * @return string
     */
    public static function applyGalleryDir($string)
    {
        if (self::checkIfImageExists($string)) {
            return self::getGalleryDir() . $string;
        }

        return self::getNoImage();
    }

    public static function applyFilePath($string)
    {
        return self::getGalleryPath() . self::applyGalleryDir($string);
    }

    public static function checkIfImageExists($string)
    {
        $file = self::getGalleryDir() . $string;
        $filepath = __DIR__ . '/../../../../../web/' . $file;

        return is_file($filepath) && file_exists($filepath);
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
}
