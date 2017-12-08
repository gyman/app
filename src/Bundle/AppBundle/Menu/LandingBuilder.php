<?php
namespace Gyman\Bundle\AppBundle\Menu;

use Gyman\Domain\Member;
use Gyman\Domain\Voucher;
use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\SecurityContext;

class LandingBuilder
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function tabs()
    {
        $menu = $this->factory->createItem('root');

        $menu->setChildrenAttribute('class', 'nav nav-tabs');

        $menu->addChild('schedule_label', [
                'uri'            => '#schedulePane',
                'extras'         => ['icon' => 'icomoon-icon-users'],
                'linkAttributes' => [
                    'data-toggle' => 'tab',
                ],
                'attributes' => [
                    'class' => 'active',
                ],
        ])->setExtra('translation_domain', 'GymanAppBundle');

        $menu->addChild('address_label', [
                'uri'            => '#addressPane',
                'extras'         => ['icon' => 'icomoon-icon-users'],
                'linkAttributes' => [
                    'data-toggle' => 'tab',
                ],
                'attributes' => [
                    'class' => '',
                ],
        ])->setExtra('translation_domain', 'GymanAppBundle');

        $menu->addChild('map_label', [
                'uri'            => '#mapPane',
                'extras'         => ['icon' => 'icomoon-icon-users'],
                'linkAttributes' => [
                    'data-toggle' => 'tab',
                ],
                'attributes' => [
                    'class' => '',
                ],
        ])->setExtra('translation_domain', 'GymanAppBundle');


        return $menu;
    }
}
