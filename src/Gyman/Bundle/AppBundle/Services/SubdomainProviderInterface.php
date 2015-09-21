<?php

namespace Gyman\Bundle\AppBundle\Services;

/**
 * Interface SubdomainProviderInterface
 * @package Gyman\Bundle\AppBundle\Services
 */
interface SubdomainProviderInterface
{
    /**
     * @return string
     */
    public function getSubdomain();
}
