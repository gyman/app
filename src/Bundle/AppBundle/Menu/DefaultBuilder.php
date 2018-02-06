<?php

namespace Gyman\Bundle\AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;

class DefaultBuilder
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * @var AuthorizationCheckerInterface
     */
    private $authorizationChecker;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory, AuthorizationCheckerInterface $checker)
    {
        $this->factory = $factory;
        $this->authorizationChecker = $checker;
    }

    public function profile()
    {
        $menu = $this->factory->createItem('root');

        if (!$this->authorizationChecker->isGranted('ROLE_MODERATOR')) {
            return $menu;
        }

        $menu->setChildrenAttribute('class', 'span6');

        $menu->addChild(
            'navigation.edit_profile',
            [
                'route' => 'profile_edit',
                'extras' => ['icon' => 'fa-user'],
                'linkAttributes' => [
                    'class' => 'btn btn-block',
                ],
            ]
        )->setExtra('translation_domain', 'DefaultBundle');

        $menu->addChild(
            'navigation.logout',
            [
                'route' => 'fos_user_security_logout',
                'extras' => ['icon' => 'fa-plus'],
                'linkAttributes' => [
                    'class' => 'btn btn-block',
                ],
            ]
        )->setExtra('translation_domain', 'DefaultBundle');

        return $menu;
    }
    public function quickButtons() : ItemInterface
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('navigation.menu.add_member', [
            'route' => 'gyman_member_new',
            'extras' => ['icon' => 'fa-user'],
            'linkAttributes' => [
                'class' => ''
            ],
        ])->setExtra('translation_domain', 'DefaultBundle');

        $menu->addChild('navigation.menu.activities', [
            'route' => 'gyman_app_activities',
            'extras' => ['icon' => 'fa-user'],
            'linkAttributes' => [
                'class' => ''
            ],
        ])->setExtra('translation_domain', 'DefaultBundle');


        $menu->addChild('navigation.menu.sell_voucher', [
//            'route' => 'gyman_voucher_new',
            'uri' => '/',
            'extras' => ['icon' => 'fa-user'],
            'linkAttributes' => [
                'class' => ''
            ],
        ])->setExtra('translation_domain', 'DefaultBundle');

        $menu->addChild('navigation.menu.new_entry', [
            'route' => 'gyman_entry_new',
            'extras' => ['icon' => 'fa-user'],
            'linkAttributes' => [
                'class' => ''
            ],
        ])->setExtra('translation_domain', 'DefaultBundle');

        return $menu;
    }

    public function main() : ItemInterface
    {
        $menu = $this->factory->createItem('root');

        if (!$this->authorizationChecker->isGranted('ROLE_MODERATOR')) {
            return $menu;
        }

        $menu->setChildrenAttribute('class', '');

        $menu->addChild('navigation.menu.search', [
            'route' => 'gyman_members_search_form',
            'extras' => ['icon' => 'fa-user'],
            'linkAttributes' => [
                'class' => ''
            ],
        ])->setExtra('translation_domain', 'DefaultBundle');

        $menu->addChild('navigation.menu.reports', [
            'route' => 'gyman_reports_index',
            'extras' => ['icon' => 'fa-user'],
            'linkAttributes' => [
                'class' => ''
            ],
        ])->setExtra('translation_domain', 'DefaultBundle');

        $menu->addChild('navigation.menu.schedule', [
            'route' => 'dende_calendar_default_index',
            'extras' => ['icon' => 'fa-user'],
            'linkAttributes' => [
                'class' => ''
            ],
        ])->setExtra('translation_domain', 'DefaultBundle');

        return $menu;
    }

    public function settings() : ItemInterface
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Informacje o klubie', [
            'route'          => 'gyman_settings_details',
            'extras'         => ['icon' => 'fa-user'],
            'linkAttributes' => [
                'class'            => 'tipB',
                'aria-describedby' => 'qtip-21',
            ],
        ])->setExtra('translation_domain', 'GymanSettingsBundle');

        $menu->addChild('Sekcje', [
            'route'          => 'gyman_settings_sections',
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

        return $menu;
    }

    public function user() : ItemInterface
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Twój profil', [
            'route'          => 'profile_edit',
            'extras'         => ['icon' => 'fa-user'],
            'linkAttributes' => [
            ],
        ])->setExtra('translation_domain', 'GymanSettingsBundle');

        $menu->addChild('Wyloguj', [
            'route'          => 'fos_user_security_logout',
            'extras'         => ['icon' => 'fa-user'],
            'linkAttributes' => [
            ],
        ])->setExtra('translation_domain', 'GymanSettingsBundle');

        return $menu;

    }
}
