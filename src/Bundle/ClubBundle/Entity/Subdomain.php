<?php
namespace Gyman\Bundle\ClubBundle\Entity;

/**
 * Class Subdomain
 * @package Gyman\Bundle\ClubBundle
 */
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

    public function getName() : ?string
    {
        return $this->name;
    }
}
