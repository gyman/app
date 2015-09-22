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

    /**
     * Boots the Bundle.
     */
    public function boot()
    {
        parent::boot();

        if ($this->container->getParameter('kernel.environment') !== 'prod') {
            $this->container->get('gyman.multidatabase.doctrine_fixtures_load_listener')->setOptions([
                'default' => $this->container->getParameter('standardfixtures'),
                'club'    => $this->container->getParameter('clubfixtures'),
            ]);
        }
    }
}
