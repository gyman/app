<?php

namespace Gyman\Bundle\LayoutBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class LayoutExtension extends Extension implements PrependExtensionInterface
{
//
//    /**
//     * {@inheritDoc}
//     */
    public function load(array $configs, ContainerBuilder $container)
{
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');
    }

    /**
     * {@inheritDoc}
     */
    public function prepend(ContainerBuilder $container)
    {
//        $bundles = $container->getParameter('kernel.bundles');

        // Configure AsseticBundle
//        if (isset($bundles['AsseticBundle']))
//        {
//            $this->configureAsseticBundle($container);
//        }
    }
//
//    /**
//     * Configures the AsseticBundle.
//     *
//     * @param ContainerBuilder $container The service container
//     *
//     * @return void
//     */
//    private function configureAsseticBundle(ContainerBuilder $container) {
//        $configs = $container->getExtensionConfig($this->getAlias());
//        $config = $this->processConfiguration(new Configuration(), $configs);
//
//        foreach ($container->getExtensions() as $name => $extension) {
//            switch ($name) {
//                case 'assetic':
//                    $container->prependExtensionConfig(
//                            $name, array(
//                        'assets' => $this->buildAsseticConfig($config)
//                            )
//                    );
//                    break;
//            }
//        }
//    }
//
//    private function buildAsseticConfig(array $config) {
//        return array(
////            'supr_css' => $this->buildAsseticCssConfig($config),
//            'supr_js'  => $this->buildAsseticJsConfig($config),
//        );
//    }
//
//    private function buildAsseticCssConfig(array $config) {
//        return array(
//            'inputs'  => array(
////                $config['assets_dir'] . '/css/supr-theme/jquery.ui.supr.css',
//                $config['assets_dir'] . '/css/icons.css',
//
//
//                $config['assets_dir'] . '/plugins/misc/qtip/jquery.qtip.css',
//                $config['assets_dir'] . '/plugins/misc/fullcalendar/fullcalendar.css',
//                $config['assets_dir'] . '/plugins/misc/search/tipuesearch.css',
//                $config['assets_dir'] . '/plugins/forms/uniform/uniform.default.css',
//                $config['assets_dir'] . '/css/main.css',
//                $config['assets_dir'] . '/css/supr-theme/jquery-ui-timepicker-addon.css',
//                $config['assets_dir'] . '/css/supr-theme/jquery.ui.autocomplete.css',
//                $config['assets_dir'] . '/css/supr-theme/jquery.ui.combobox.css',
//                $config['assets_dir'] . '/css/supr-theme/jquery.ui.core.css',
//                $config['assets_dir'] . '/css/supr-theme/jquery.ui.datepicker.css',
//                $config['assets_dir'] . '/css/supr-theme/jquery.ui.dialog.css',
//                $config['assets_dir'] . '/css/supr-theme/jquery.ui.progressbar.css',
//                $config['assets_dir'] . '/css/supr-theme/jquery.ui.resizable.css',
//                $config['assets_dir'] . '/css/supr-theme/jquery.ui.slider.css',
//                $config['assets_dir'] . '/css/supr-theme/jquery.ui.spinner.css',
//                $config['assets_dir'] . '/css/supr-theme/jquery.ui.theme.css',
//                $config['assets_dir'] . '/css/supr-theme/jquery.ui.tooltip.css',
//                $config['assets_dir'] . '/css/custom.css',
//                $config['assets_dir'] . '/css/ie8.css',
//            ),
//            'filters' => array('cssrewrite'),
//            'output'  => $config['output_dir'] . '/css/*.css'
//        );
//    }
//
//    private function buildAsseticJsConfig(array $config) {
//        return array(
//            'inputs' => array(
//                $config['assets_dir'] . '/js/libs/excanvas.min.js',
//                $config['assets_dir'] . '/js/libs/jRespond.min.js',
//                $config['assets_dir'] . '/js/libs/respond.min.js',
//                $config['assets_dir'] . '/js/libs/modernizr.js',
//                $config['assets_dir'] . '/js/jquery.blockUI.js',
//                $config['assets_dir'] . '/plugins/charts/sparkline/jquery.sparkline.min.js',
//                $config['assets_dir'] . '/plugins/charts/knob/jquery.knob.js',
//                $config['assets_dir'] . '/plugins/misc/fullcalendar/fullcalendar.min.js',
//                $config['assets_dir'] . '/plugins/misc/qtip/jquery.qtip.min.js',
//                $config['assets_dir'] . '/plugins/misc/totop/jquery.ui.totop.min.js',
//                $config['assets_dir'] . '/plugins/forms/uniform/jquery.uniform.min.js',
//                $config['assets_dir'] . '/js/supr-theme/jquery-ui-sliderAccess.js',
//                $config['assets_dir'] . '/js/supr-theme/jquery-ui-timepicker-addon.js',
//                $config['assets_dir'] . '/js/main.js',
//                $config['assets_dir'] . '/js/dashboard.js',
//
////                $config['assets_dir'] . '/js/buttons.js',
////                $config['assets_dir'] . '/js/calendar.js',
////                $config['assets_dir'] . '/js/charts.js',
////                $config['assets_dir'] . '/js/dashboard.js',
////                $config['assets_dir'] . '/js/datatable.js',
////                $config['assets_dir'] . '/js/drag.js',
////                $config['assets_dir'] . '/js/elements.js',
////                $config['assets_dir'] . '/js/email.js',
////                $config['assets_dir'] . '/js/empty.js',
////                $config['assets_dir'] . '/js/file.js',
////                $config['assets_dir'] . '/js/form-validation.js',
////                $config['assets_dir'] . '/js/forms.js',
////                $config['assets_dir'] . '/js/jquery.mousewheel.js',
////                $config['assets_dir'] . '/js/main.js',
////                $config['assets_dir'] . '/js/support.js',
////                $config['assets_dir'] . '/js/tables.js',
////                $config['assets_dir'] . '/js/widgets.js',
//            ),
//            'output' => $config['output_dir'] . '/js/*.js'
//        );
//    }
}
