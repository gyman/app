<?php

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

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
            new Knp\Bundle\TimeBundle\KnpTimeBundle(),
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
            new FOS\UserBundle\FOSUserBundle(),

            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),

//            new JMS\SerializerBundle\JMSSerializerBundle(),
            new Ob\HighchartsBundle\ObHighchartsBundle(),
            new League\Tactician\Bundle\TacticianBundle(),
            new Liip\MonitorBundle\LiipMonitorBundle(),

            new Dende\CommonBundle\DendeCommonBundle(),
            new Dende\CalendarBundle\DendeCalendarBundle(),
            new Dende\MultitenancyBundle\DendeMultitenancyBundle(),

            new Gyman\Bundle\DashboardBundle\DashboardBundle(),
            new Gyman\Bundle\ChartsBundle\ChartsBundle(),
            new Gyman\Bundle\ClubBundle\ClubBundle(),
            new Gyman\Bundle\AccountBundle\AccountBundle(),
            new Gyman\Bundle\MailerBundle\MailerBundle(),
            new Gyman\Bundle\BaseBundle\BaseBundle(),
            new Gyman\Bundle\AppBundle\GymanAppBundle(),
            new Gyman\Bundle\ReportsBundle\GymanReportsBundle(),
            new Gyman\Bundle\LandingPageBundle\GymanLandingPageBundle(),
            new Gyman\Bundle\SettingsBundle\GymanSettingsBundle(),

	        new Sentry\SentryBundle\SentryBundle(),
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

    public function getCacheDir()
    {
        return $this->rootDir.'/../var/cache/'.$this->environment;
    }

    public function getLogDir()
    {
        return $this->rootDir.'/../var/logs';
    }


}
