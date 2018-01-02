<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Services;

/**
 * Interface SubdomainProviderInterface.
 */
interface SubdomainProviderInterface
{
    /**
     * @return string
     */
    public function getSubdomain();
}
