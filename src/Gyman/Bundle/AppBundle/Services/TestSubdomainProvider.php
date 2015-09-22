<?php

namespace Gyman\Bundle\AppBundle\Services;

final class TestSubdomainProvider implements SubdomainProviderInterface
{
    /**
     * @return string|null
     */
    public function getSubdomain()
    {
        return 'dende';
    }
}
