<?php
namespace Gyman\Bundle\AccountBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function navigation(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->setCurrent(
            $this->container->get('request')->getRequestUri()
        );

        $menu->addChild('profile_menu.label.dashboard', ['route' => 'profile_dashboard', 'extras' => ['icon' => 'fa-user']])
            ->setExtra('translation_domain', 'AccountBundle');

        $menu->addChild('profile_menu.label.orders', ['route' => 'profile_orders', 'extras' => ['icon' => 'fa-shopping-cart']])
            ->setExtra('translation_domain', 'AccountBundle');

        $menu->addChild('profile_menu.label.invoice_data', ['route' => 'profile_invoices', 'extras' => ['icon' => 'fa-envelope-o']])
            ->setExtra('translation_domain', 'AccountBundle');

        $menu->addChild('profile_menu.label.buy_subscription', ['route' => 'frontpage_pricing', 'extras' => ['icon' => 'fa-plus']])
            ->setExtra('translation_domain', 'AccountBundle');

        return $menu;
    }
}
