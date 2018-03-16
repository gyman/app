<?php
namespace Gyman\Bundle\CalendarBundle;

use Gyman\Calendar\Domain\Calendar\Event;
use Gyman\Bundle\CalendarBundle\DependencyInjection\CompilerPass\UpdateStrategiesPass;
use Gyman\Bundle\CalendarBundle\Tests\Entity\OccurrenceExtended;
use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DendeCalendarBundle extends Bundle
{
    public function boot()
    {
        parent::boot();

        Event::setOccurrenceClass(OccurrenceExtended::class);
    }

    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $this->addRegisterMappingsPass($container);
    }

    /**
     * @param ContainerBuilder $container
     */
    private function addRegisterMappingsPass(ContainerBuilder $container)
    {
        $mappings = [realpath(__DIR__ . '/Resources/config/doctrine') => 'Gyman\Calendar\Domain'];

        $ormCompilerClass = 'Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass';

        if (class_exists($ormCompilerClass)) {
            $registerMappingCompilerPass = DoctrineOrmMappingsPass::createYamlMappingDriver(
                $mappings,
                ['dende_calendar.model_manager_name'],
                'dende_calendar.backend_type_orm',
                ['Calendar' => 'Gyman\Calendar\Domain']
            );

            $container->addCompilerPass($registerMappingCompilerPass);
        }

        $container->addCompilerPass(new UpdateStrategiesPass());
    }
}
