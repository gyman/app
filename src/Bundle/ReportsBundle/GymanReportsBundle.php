<?php

declare(strict_types=1);

namespace Gyman\Bundle\ReportsBundle;

use Gyman\Bundle\ReportsBundle\DependencyInjection\CompilerPass\ReportsGeneratorStrategies;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class GymanReportsBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new ReportsGeneratorStrategies());
    }
}
