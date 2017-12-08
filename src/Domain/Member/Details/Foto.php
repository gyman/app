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
    public function __construct(string $foto = null)
    {
        $this->foto = $foto;
    }

    /**
     * @return string
     */
    public function foto() : ?string
    {
        return $this->foto;
    }
}
