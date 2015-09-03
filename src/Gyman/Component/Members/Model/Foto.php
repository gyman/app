<?php
namespace Gyman\Component\Members\Model;

class Foto
{
    /**
     * @var string
     */
    protected $foto = 'no-profile.gif';

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
}
