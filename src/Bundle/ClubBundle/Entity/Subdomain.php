<?php

declare(strict_types=1);

namespace Gyman\Bundle\ClubBundle\Entity;

/**
 * Class Subdomain.
 */
final class Subdomain
{
    /**
     * @var string
     */
    private $name;

    /**
     * Subdomain constructor.
     *
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
