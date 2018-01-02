<?php

declare(strict_types=1);

namespace Gyman\Bundle\SettingsBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

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
            'route'          => 'gyman_settings_sections',
            'extras'         => ['icon' => 'fa-user'],
            'linkAttributes' => [
                'class'            => 'tipB',
                'aria-describedby' => 'qtip-21',
            ],
        ])->setExtra('translation_domain', 'GymanSettingsBundle');

        $menu->addChild('Grafik zajęć', [
            'route'          => 'gyman_settings_sections',
            'extras'         => ['icon' => 'fa-user'],
            'linkAttributes' => [
                'class'            => 'tipB',
                'aria-describedby' => 'qtip-21',
            ],
        ])->setExtra('translation_domain', 'GymanSettingsBundle');

        $menu->addChild('Rodzaje karnetów', [
            'route'          => 'gyman_settings_sections',
            'extras'         => ['icon' => 'fa-user'],
            'linkAttributes' => [
                'class'            => 'tipB',
                'aria-describedby' => 'qtip-21',
            ],
        ])->setExtra('translation_domain', 'GymanSettingsBundle');

        return $menu;
    }
}
