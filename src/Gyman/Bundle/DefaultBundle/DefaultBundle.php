<?php

namespace Gyman\Bundle\DefaultBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Gyman\Bundle\DefaultBundle\Lib\Globals;

class DefaultBundle extends Bundle
{
    public function boot()
    {
        parent::boot();

        Globals::setNoImage($this->container->getParameter('default.noImage'));
        Globals::setGalleryDir($this->container->getParameter('default.galleryDir'));
    }
}
