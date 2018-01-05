<?php
namespace Gyman\Bundle\SettingsBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\SecurityContext;

class DefaultBuilder
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * @var AuthorizationCheckerInterface
     */
    private $checker;

    public function __construct(FactoryInterface $factory, AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->factory = $factory;
        $this->checker = $authorizationChecker;
    }

    public function main()
    {
        $menu = $this->factory->createItem('root');

        if (!$this->checker->isGranted('ROLE_ADMIN')) {
            return $menu;
        }

        $menu->setChildrenAttribute('class', 'bigBtnIcon');

        $menu->addChild('Sekcje', [
            'route'          => 'gyman_settings_sections',
            'extras'         => ['icon' => 'fa-user'],
            'linkAttributes' => [
                'class'            => 'tipB',
                'aria-describedby' => 'qtip-21',
            ],
        ])->setExtra('translation_domain', 'GymanSettingsBundle');

        $menu->addChild('Informacje o klubie', [
            'route'          => 'gyman_settings_details',
            'extras'         => ['icon' => 'fa-user'],
            'linkAttributes' => [
                'class'            => 'tipB',
                'aria-describedby' => 'qtip-21',
            ],
        ])->setExtra('translation_domain', 'GymanSettingsBundle');

        $menu->addChild('Użytkownicy', [
            'route'          => 'admin_users',
            'extras'         => ['icon' => 'fa-user'],
            'linkAttributes' => [
                'class'            => 'tipB',
                'aria-describedby' => 'qtip-21',
            ],
        ])->setExtra('translation_domain', 'GymanSettingsBundle');

//        $menu->addChild('Grafik zajęć', [
//            'route'          => 'gyman_settings_sections',
//            'extras'         => ['icon' => 'fa-user'],
//            'linkAttributes' => [
//                'class'            => 'tipB',
//                'aria-describedby' => 'qtip-21',
//            ],
//        ])->setExtra('translation_domain', 'GymanSettingsBundle');
//
//        $menu->addChild('Rodzaje karnetów', [
//            'route'          => 'gyman_settings_sections',
//            'extras'         => ['icon' => 'fa-user'],
//            'linkAttributes' => [
//                'class'            => 'tipB',
//                'aria-describedby' => 'qtip-21',
//            ],
//        ])->setExtra('translation_domain', 'GymanSettingsBundle');

        return $menu;
    }

    public function navigation(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->setCurrent(
            $this->container->get('request')->getRequestUri()
        );

        $menu->addChild('profile_menu.label.dashboard', ['route' => 'profile_dashboard', 'extras' => ['icon' => 'fa-user']])
            ->setExtra('translation_domain', 'SettingsBundle');

        $menu->addChild('profile_menu.label.orders', ['route' => 'profile_orders', 'extras' => ['icon' => 'fa-shopping-cart']])
            ->setExtra('translation_domain', 'SettingsBundle');

        $menu->addChild('profile_menu.label.invoice_data', ['route' => 'profile_invoices', 'extras' => ['icon' => 'fa-envelope-o']])
            ->setExtra('translation_domain', 'SettingsBundle');

        $menu->addChild('profile_menu.label.buy_subscription', ['route' => 'frontpage_pricing', 'extras' => ['icon' => 'fa-plus']])
            ->setExtra('translation_domain', 'SettingsBundle');

        return $menu;
    }
}
