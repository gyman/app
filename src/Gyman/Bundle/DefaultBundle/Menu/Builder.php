<?php

namespace Gyman\Bundle\DefaultBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function profile(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->setChildrenAttribute("class", "span6");

        $menu->addChild('navigation.edit_profile',
            array(
                'route' => 'profile_edit',
                "extras" => array("icon" => 'fa-user'),
                'linkAttributes' => array(
                    "class" => 'btn btn-block',
                )
            ))->setExtra('translation_domain', 'AccountBundle');

        $menu->addChild('navigation.logout',
            array(
                'route' => 'fos_user_security_logout',
                "extras" => array("icon" => 'fa-plus'),
                'linkAttributes' => array(
                    "class" => 'btn btn-block',
                )
            ))->setExtra('translation_domain', 'AccountBundle');

        return $menu;
    }

    public function main(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->setChildrenAttribute("class", "bigBtnIcon");

        $menu->addChild('navigation.menu.dashboard', array(
            'route' => '_dashboard_index',
            "extras" => array("icon" => 'fa-user'),
            'linkAttributes' => array(
                "class" => 'tipB',
                'aria-describedby' =>"qtip-21"
            )
        ))->setExtra('translation_domain', 'AccountBundle');

        $menu->addChild('navigation.menu.members', array(
            'route' => '_list_members',
            "extras" => array("icon" => 'fa-user'),
            'linkAttributes' => array(
                "class" => 'tipB',
                'aria-describedby' =>"qtip-21"
            )
        ))->setExtra('translation_domain', 'AccountBundle');

        $menu->addChild('navigation.menu.schedule', array(
            'route' => '_schedule_calendar',
            "extras" => array("icon" => 'fa-user'),
            'linkAttributes' => array(
                "class" => 'tipB',
                'aria-describedby' =>"qtip-21"
            )
        ))->setExtra('translation_domain', 'AccountBundle');

        $menu->addChild('navigation.menu.vouchers', array(
            'route' => '_vouchers_list',
            "extras" => array("icon" => 'fa-user'),
            'linkAttributes' => array(
                "class" => 'tipB',
                'aria-describedby' =>"qtip-21"
            )
        ))->setExtra('translation_domain', 'AccountBundle');

        $menu->addChild('navigation.menu.entries', array(
            'route' => '_list_entries',
            "extras" => array("icon" => 'fa-user'),
            'linkAttributes' => array(
                "class" => 'tipB',
                'aria-describedby' =>"qtip-21"
            )
        ))->setExtra('translation_domain', 'AccountBundle');


        $menu->addChild('navigation.menu.analytics', array(
            'uri' => '/',
            "extras" => array("icon" => 'fa-user'),
            'linkAttributes' => array(
                "class" => 'tipB',
                'aria-describedby' =>"qtip-21"
            )
        ))->setExtra('translation_domain', 'AccountBundle');

        $menu->addChild('navigation.menu.employees', array(
            'uri' => '/',
            "extras" => array("icon" => 'fa-user'),
            'linkAttributes' => array(
                "class" => 'tipB',
                'aria-describedby' =>"qtip-21"
            )
        ))->setExtra('translation_domain', 'AccountBundle');

        $menu->addChild('navigation.menu.clubs_and_sections', array(
            'uri' => '/',
            "extras" => array("icon" => 'fa-user'),
            'linkAttributes' => array(
                "class" => 'tipB',
                'aria-describedby' =>"qtip-21"
            )
        ))->setExtra('translation_domain', 'AccountBundle');

        $menu->addChild('navigation.menu.payments', array(
            'uri' => '/',
            "extras" => array("icon" => 'fa-user'),
            'linkAttributes' => array(
                "class" => 'tipB',
                'aria-describedby' =>"qtip-21"
            )
        ))->setExtra('translation_domain', 'AccountBundle');

        $menu->addChild('navigation.menu.dontknow', array(
            'uri' => '/',
            "extras" => array("icon" => 'fa-user'),
            'linkAttributes' => array(
                "class" => 'tipB',
                'aria-describedby' =>"qtip-21"
            )
        ))->setExtra('translation_domain', 'AccountBundle');

        return $menu;
    }
}
