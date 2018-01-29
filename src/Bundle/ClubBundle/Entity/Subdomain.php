<?php
namespace Gyman\Bundle\ClubBundle\Entity;

final class Subdomain
{
    /**
     * @var string
     */
    private $name;

    public function __construct(?string $name = null)
    {
        $this->name = $name;
    }

    public function name() : ?string
    {
        return $this->name;
    }
}
