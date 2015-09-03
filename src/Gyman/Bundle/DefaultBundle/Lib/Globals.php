<?php
namespace Gyman\Bundle\DefaultBundle\Lib;

class Globals
{
    const CURRENT_CLUB_SESSION_KEY = 'current_club';

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

// <editor-fold defaultstate="collapsed" desc="setters and getters">

    public static function getGalleryDir()
    {
        return self::$galleryDir;
    }

    public static function setGalleryDir($galleryDir)
    {
        self::$galleryDir = $galleryDir;
    }

    public static function getNoImage()
    {
        return self::$noImage;
    }

    public static function setNoImage($noImage)
    {
        self::$noImage = $noImage;
    }

// </editor-fold>

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
}
