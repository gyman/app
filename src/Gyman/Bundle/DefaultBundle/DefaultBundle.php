<?php
namespace Gyman\Bundle\DefaultBundle;

use Gyman\Bundle\DefaultBundle\Lib\Globals;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DefaultBundle extends Bundle
{
    public function boot()
    {
        parent::boot();

        Globals::setNoImage($this->container->getParameter('default.noImage'));
        Globals::setGalleryDir($this->container->getParameter('default.galleryDir'));
    }
}
