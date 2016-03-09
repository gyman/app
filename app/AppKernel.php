<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),

            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new Knp\Bundle\TimeBundle\KnpTimeBundle(),

            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
            new FOS\RestBundle\FOSRestBundle(),
            new FOS\UserBundle\FOSUserBundle(),

            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),

            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle(),
            new Ob\HighchartsBundle\ObHighchartsBundle(),
            new Bazinga\Bundle\HateoasBundle\BazingaHateoasBundle(),
            new Nelmio\ApiDocBundle\NelmioApiDocBundle(),
            new SmartCore\Bundle\AcceleratorCacheBundle\AcceleratorCacheBundle(),
            new Bc\Bundle\BootstrapBundle\BcBootstrapBundle(),

            new League\Tactician\Bundle\TacticianBundle(),

            new Dende\CommonBundle\DendeCommonBundle(),
            new Dende\CalendarBundle\DendeCalendarBundle(),
            new Dende\MultidatabaseBundle\DendeMultidatabaseBundle(),

            new Gyman\Bundle\DashboardBundle\DashboardBundle(),
            new Gyman\Bundle\TestBundle\TestBundle(),
            new Gyman\Bundle\ChartsBundle\ChartsBundle(),
            new Gyman\Bundle\UserBundle\UserBundle(),
            new Gyman\Bundle\ClubBundle\ClubBundle(),
            new Gyman\Bundle\AccountBundle\AccountBundle(),
            new Gyman\Bundle\MailerBundle\MailerBundle(),
            new Gyman\Bundle\BaseBundle\BaseBundle(),
//            new Gyman\Bundle\TimelineBundle\TimelineBundle(),

            new Gyman\Bundle\AppBundle\GymanAppBundle(),
            new Gyman\Bundle\ReportsBundle\GymanReportsBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Liip\FunctionalTestBundle\LiipFunctionalTestBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }

    public function boot()
    {
        parent::boot();
        $logger = $this->container->get('logger');
        \Monolog\ErrorHandler::register($logger);
    }
}
