<?php

namespace Gyman\Bundle\DefaultBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class Builder
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

        if($context->getToken()) {
            $this->user = $context->getToken()->getUser();
        }
    }

    public function profile(Request $request)
    {
        $menu = $this->factory->createItem('root');

        if(!$this->context->isGranted("ROLE_USER")) {
            return $menu;
        }

        $menu->setChildrenAttribute("class", "span6");

        $menu->addChild('navigation.edit_profile',
            array(
                'route' => 'profile_edit',
                "extras" => array("icon" => 'fa-user'),
                'linkAttributes' => array(
                    "class" => 'btn btn-block',
                )
            ))->setExtra('translation_domain', 'DefaultBundle');

        $menu->addChild('navigation.logout',
            array(
                'route' => 'fos_user_security_logout',
                "extras" => array("icon" => 'fa-plus'),
                'linkAttributes' => array(
                    "class" => 'btn btn-block',
                )
            ))->setExtra('translation_domain', 'DefaultBundle');

        return $menu;
    }

    public function main(Request $request)
    {
        $menu = $this->factory->createItem('root');

        if(!$this->context->isGranted("ROLE_ADMIN")) {
            return $menu;
        }

        $menu->setChildrenAttribute("class", "bigBtnIcon");

        $menu->addChild('navigation.menu.dashboard', array(
            'route' => '_dashboard_index',
            "extras" => array("icon" => 'fa-user'),
            'linkAttributes' => array(
                "class" => 'tipB',
                'aria-describedby' =>"qtip-21"
            )
        ))->setExtra('translation_domain', 'DefaultBundle');

        $menu->addChild('navigation.menu.members', array(
            'route' => '_list_members',
            "extras" => array("icon" => 'fa-user'),
            'linkAttributes' => array(
                "class" => 'tipB',
                'aria-describedby' =>"qtip-21"
            )
        ))->setExtra('translation_domain', 'DefaultBundle');

        $menu->addChild('navigation.menu.schedule', array(
            'route' => '_schedule_calendar',
            "extras" => array("icon" => 'fa-user'),
            'linkAttributes' => array(
                "class" => 'tipB',
                'aria-describedby' =>"qtip-21"
            )
        ))->setExtra('translation_domain', 'DefaultBundle');

        $menu->addChild('navigation.menu.vouchers', array(
            'route' => '_vouchers_list',
            "extras" => array("icon" => 'fa-user'),
            'linkAttributes' => array(
                "class" => 'tipB',
                'aria-describedby' =>"qtip-21"
            )
        ))->setExtra('translation_domain', 'DefaultBundle');

        $menu->addChild('navigation.menu.entries', array(
            'route' => '_list_entries',
            "extras" => array("icon" => 'fa-user'),
            'linkAttributes' => array(
                "class" => 'tipB',
                'aria-describedby' =>"qtip-21"
            )
        ))->setExtra('translation_domain', 'DefaultBundle');


        $menu->addChild('navigation.menu.analytics', array(
            'uri' => '/',
            "extras" => array("icon" => 'fa-user'),
            'linkAttributes' => array(
                "class" => 'tipB',
                'aria-describedby' =>"qtip-21"
            )
        ))->setExtra('translation_domain', 'DefaultBundle');

        $menu->addChild('navigation.menu.employees', array(
            'uri' => '/',
            "extras" => array("icon" => 'fa-user'),
            'linkAttributes' => array(
                "class" => 'tipB',
                'aria-describedby' =>"qtip-21"
            )
        ))->setExtra('translation_domain', 'DefaultBundle');

        $menu->addChild('navigation.menu.clubs_and_sections', array(
            'uri' => '/',
            "extras" => array("icon" => 'fa-user'),
            'linkAttributes' => array(
                "class" => 'tipB',
                'aria-describedby' =>"qtip-21"
            )
        ))->setExtra('translation_domain', 'DefaultBundle');

        $menu->addChild('navigation.menu.payments', array(
            'uri' => '/',
            "extras" => array("icon" => 'fa-user'),
            'linkAttributes' => array(
                "class" => 'tipB',
                'aria-describedby' =>"qtip-21"
            )
        ))->setExtra('translation_domain', 'DefaultBundle');

        $menu->addChild('navigation.menu.dontknow', array(
            'uri' => '/',
            "extras" => array("icon" => 'fa-user'),
            'linkAttributes' => array(
                "class" => 'tipB',
                'aria-describedby' =>"qtip-21"
            )
        ))->setExtra('translation_domain', 'DefaultBundle');

        return $menu;
    }
}
