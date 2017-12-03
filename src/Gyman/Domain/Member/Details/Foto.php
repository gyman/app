<?php
namespace Gyman\Domain\Member\Details;

use Gyman\Bundle\AppBundle\Globals;
use Symfony\Component\VarDumper\VarDumper;

/**
 * Class Foto
 * @package Gyman\Domain
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
    public function __construct($foto = null)
    {
        $this->foto = $foto;
    }

    /**
     * @return string
     */
    public function foto() : string
    {
        return $this->foto ?: Globals::getNoImage();
    }

    public function fotoWithPath() : string
    {
        return $this->foto ? Globals::applyGalleryPath($this->foto) : Globals::getNoImage();
    }
}
