<?php
namespace Gyman\Bundle\AppBundle;

use Gyman\Bundle\AppBundle\Services\SubdomainProvider;

class GlobalsFactory
{
    /** @var  SubdomainProvider */
    private $subdomainProvider;

    /**
     * GlobalsFactory constructor.
     * @param SubdomainProvider $subdomainProvider
     */
    public function __construct(SubdomainProvider $subdomainProvider)
    {
        $this->subdomainProvider = $subdomainProvider;
    }

    public function setUp()
    {
        Globals::setSubdomain($this->subdomainProvider->getSubdomain());
    }
}