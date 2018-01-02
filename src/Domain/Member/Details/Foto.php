<?php

declare(strict_types=1);

namespace Gyman\Domain\Member\Details;

/**
 * Class Foto.
 */
class Foto
{
    /**
     * @var string
     */
    protected $foto;

    /**
     * Foto constructor.
     *
     * @param string $foto
     */
    public function __construct(string $foto = null)
    {
        $this->foto = $foto;
    }

    /**
     * @return string
     */
    public function foto(): ?string
    {
        return $this->foto;
    }
}
