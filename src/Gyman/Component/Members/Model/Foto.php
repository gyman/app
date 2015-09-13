<?php
namespace Gyman\Component\Members\Model;

use Gyman\Bundle\DefaultBundle\Lib\Globals;

/**
 * Class Foto
 * @package Gyman\Component\Members
 */
class Foto
{
    /**
     * @var string
     */
    protected $foto;

    /**
     * Foto constructor.
     * @param string $foto
     */
    public function __construct($foto)
    {
        $this->foto = $foto;
    }

    /**
     * @return string
     */
    public function foto()
    {
        return $this->foto;
    }

    public function fotoWithPath()
    {
        return Globals::applyGalleryDir($this->foto);
    }
}
