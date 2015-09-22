<?php

namespace Gyman\Domain\Model;

use Gyman\Bundle\AppBundle\Globals;

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
        return Globals::applyGalleryPath($this->foto);
    }
}
