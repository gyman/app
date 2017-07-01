<?php
namespace Gyman\Bundle\SettingsBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\SecurityContext;

class DefaultBuilder
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * @var SecurityContext
     */
    private $context;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory, SecurityContext $context)
    {
        $this->factory = $factory;
        $this->context = $context;

        if ($context->getToken()) {
            $this->user = $context->getToken()->getUser();
        }
    }

    public function main()
    {
        $menu = $this->factory->createItem('root');

        if (!$this->context->isGranted('ROLE_ADMIN')) {
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
            'route'          => 'gyman_settings_sections',
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

        return $menu;
    }
}
