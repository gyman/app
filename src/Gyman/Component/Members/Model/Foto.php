<?php
namespace Gyman\Component\Members\Model;

use Gyman\Bundle\DefaultBundle\Lib\Globals;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
        //        die(var_dump(Globals::applyGalleryDir($this->foto)));
        return Globals::applyGalleryDir($this->foto);
    }

    public function upload($dir)
    {
        if (!$this->foto instanceof UploadedFile) {
            return;
        }

        $filename = sprintf('%s.%s', md5(microtime(true)), $this->foto->getClientOriginalExtension());
        $this->foto->move($dir, $filename);

        $this->foto = $filename;
    }
}
