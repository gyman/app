<?php
namespace Gyman\Bundle\MultiDatabaseBundle;

use Gyman\Bundle\MultiDatabaseBundle\DependencyInjection\CompilerPass\ConnectionCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class GymanMultiDatabaseBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new ConnectionCompilerPass());

        parent::build($container);
    }
}
