<?php
namespace Gyman\Bundle\AppBundle\Menu;

use Knp\Menu\FactoryInterface;
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
            'navigation.dashboard',
            [
                'route'          => 'gyman_dashboard_index',
                'extras'         => ['icon' => 'fa-user'],
                'linkAttributes' => [
                    'class' => 'btn btn-block',
                ],
            ]
        )->setExtra('translation_domain', 'DefaultBundle');

        $menu->addChild(
            'navigation.edit_profile',
            [
                'route'          => 'profile_edit',
                'extras'         => ['icon' => 'fa-user'],
                'linkAttributes' => [
                    'class' => 'btn btn-block',
                ],
            ]
        )->setExtra('translation_domain', 'DefaultBundle');

        $menu->addChild(
            'navigation.logout',
            [
                'route'          => 'fos_user_security_logout',
                'extras'         => ['icon' => 'fa-plus'],
                'linkAttributes' => [
                    'class' => 'btn btn-block',
                ],
            ]
        )->setExtra('translation_domain', 'DefaultBundle');

        return $menu;
    }

    public function main()
    {
        $menu = $this->factory->createItem('root');

        if (!$this->authorizationChecker->isGranted('ROLE_ADMIN')) {
            return $menu;
        }

        $menu->setChildrenAttribute('class', 'bigBtnIcon');

        $menu->addChild('navigation.menu.dashboard', [
            'route'          => 'gyman_dashboard_index',
            'extras'         => ['icon' => 'fa-user'],
            'linkAttributes' => [
                'class'            => 'tipB',
                'aria-describedby' => 'qtip-21',
            ],
        ])->setExtra('translation_domain', 'DefaultBundle');

//        $menu->addChild('navigation.menu.members', [
//            'route'          => '_list_members',
//            'extras'         => ['icon' => 'fa-user'],
//            'linkAttributes' => [
//                'class'            => 'tipB',
//                'aria-describedby' => 'qtip-21',
//            ],
//        ])->setExtra('translation_domain', 'DefaultBundle');

//        $menu->addChild('navigation.menu.schedule', [
//            'route'          => '_schedule_calendar',
//            'extras'         => ['icon' => 'fa-user'],
//            'linkAttributes' => [
//                'class'            => 'tipB',
//                'aria-describedby' => 'qtip-21',
//            ],
//        ])->setExtra('translation_domain', 'DefaultBundle');

//        $menu->addChild('navigation.menu.vouchers', [
//            'route'          => '_vouchers_list',
//            'extras'         => ['icon' => 'fa-user'],
//            'linkAttributes' => [
//                'class'            => 'tipB',
//                'aria-describedby' => 'qtip-21',
//            ],
//        ])->setExtra('translation_domain', 'DefaultBundle');

//        $menu->addChild('navigation.menu.entries', [
//            'route'          => '_list_entries',
//            'extras'         => ['icon' => 'fa-user'],
//            'linkAttributes' => [
//                'class'            => 'tipB',
//                'aria-describedby' => 'qtip-21',
//            ],
//        ])->setExtra('translation_domain', 'DefaultBundle');

        $menu->addChild('navigation.menu.analytics', [
            'uri'            => '/',
            'extras'         => ['icon' => 'fa-user'],
            'linkAttributes' => [
                'class'            => 'tipB',
                'aria-describedby' => 'qtip-21',
            ],
        ])->setExtra('translation_domain', 'DefaultBundle');

        $menu->addChild('navigation.menu.employees', [
            'uri'            => '/',
            'extras'         => ['icon' => 'fa-user'],
            'linkAttributes' => [
                'class'            => 'tipB',
                'aria-describedby' => 'qtip-21',
            ],
        ])->setExtra('translation_domain', 'DefaultBundle');

        $menu->addChild('navigation.menu.clubs_and_sections', [
            'uri'            => '/',
            'extras'         => ['icon' => 'fa-user'],
            'linkAttributes' => [
                'class'            => 'tipB',
                'aria-describedby' => 'qtip-21',
            ],
        ])->setExtra('translation_domain', 'DefaultBundle');

        $menu->addChild('navigation.menu.payments', [
            'uri'            => '/',
            'extras'         => ['icon' => 'fa-user'],
            'linkAttributes' => [
                'class'            => 'tipB',
                'aria-describedby' => 'qtip-21',
            ],
        ])->setExtra('translation_domain', 'DefaultBundle');

        $menu->addChild('navigation.menu.dontknow', [
            'uri'            => '/',
            'extras'         => ['icon' => 'fa-user'],
            'linkAttributes' => [
                'class'            => 'tipB',
                'aria-describedby' => 'qtip-21',
            ],
        ])->setExtra('translation_domain', 'DefaultBundle');

        return $menu;
    }
}
