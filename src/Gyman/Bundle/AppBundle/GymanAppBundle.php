<?php
namespace Gyman\Bundle\AppBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GymanAppBundle extends Bundle
{
    public function boot()
    {
        parent::boot();

        Globals::setNoImage($this->container->getParameter('no_image'));
        Globals::setGalleryDir($this->container->getParameter('gallerydirectory'));
        Globals::setGalleryPath($this->container->getParameter('gallerypath'));
    }
}
