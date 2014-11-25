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
            new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),

            new Oneup\UploaderBundle\OneupUploaderBundle(),
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle(),
            new Ob\HighchartsBundle\ObHighchartsBundle(),
            new Bazinga\Bundle\HateoasBundle\BazingaHateoasBundle(),
            new Spy\TimelineBundle\SpyTimelineBundle(),
            new Nelmio\ApiDocBundle\NelmioApiDocBundle(),

            new Gyman\Bundle\DefaultBundle\DefaultBundle(),
            new Gyman\Bundle\MembersBundle\MembersBundle(),
            new Gyman\Bundle\VouchersBundle\VouchersBundle(),
            new Gyman\Bundle\ScheduleBundle\ScheduleBundle(),
            new Gyman\Bundle\EntriesBundle\EntriesBundle(),
            new Gyman\Bundle\DashboardBundle\DashboardBundle(),
            new Gyman\Bundle\FiltersBundle\FiltersBundle(),
            new Gyman\Bundle\ListsBundle\ListsBundle(),
            new Gyman\Bundle\ReportsBundle\ReportsBundle(),
            new Gyman\Bundle\TestBundle\TestBundle(),
            new Gyman\Bundle\ChartsBundle\ChartsBundle(),
            new Gyman\Bundle\UserBundle\UserBundle(),
            new Gyman\Bundle\ClubBundle\ClubBundle(),
            new Gyman\Bundle\SectionBundle\SectionBundle(),
            new Gyman\Bundle\AccountBundle\AccountBundle(),
            new Gyman\Bundle\MailerBundle\MailerBundle(),
            new Gyman\Bundle\BaseBundle\BaseBundle(),
            new Gyman\Bundle\TimelineBundle\TimelineBundle(),
            new Gyman\Bundle\ApiBundle\ApiBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new RaulFraile\Bundle\LadybugBundle\RaulFraileLadybugBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
