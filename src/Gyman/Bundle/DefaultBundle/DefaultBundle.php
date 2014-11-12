<?php

namespace Gyman\Bundle\DefaultBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Gyman\Bundle\DefaultBundle\DependencyInjection\CompilerPass\ConnectionCompilerPass;
use Gyman\Bundle\DefaultBundle\Lib\Globals;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;

class DefaultBundle extends Bundle
{
    public function boot()
    {
        parent::boot();

        Globals::setNoImage($this->container->getParameter('default.noImage'));
        Globals::setGalleryDir($this->container->getParameter('default.galleryDir'));
    }

    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new ConnectionCompilerPass());

        parent::build($container);
    }
}
