<?php

namespace Gyman\Bundle\DashboardBundle\Menu;

use Knp\Menu\FactoryInterface;
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
     * @param SecurityContext  $context
     */
    public function __construct(FactoryInterface $factory, SecurityContext $context)
    {
        $this->factory = $factory;
        $this->context = $context;

        if ($context->getToken()) {
            $this->user = $context->getToken()->getUser();
        }
    }

    public function actions()
    {
        $menu = $this->factory->createItem('root');

        if (!$this->context->isGranted("ROLE_USER")) {
            return $menu;
        }

        $menu->setChildrenAttribute("class", "bigBtnIcon");

        $menu->addChild(
            'dashboard.actions.new_member',
            array(
                'route' => '_member_new',
                "extras" => array("icon" => 'icomoon-icon-users'),
                'linkAttributes' => array(
                    "class" => 'tipB createNewMember openUrlInModal',
                )
            )
        )->setExtra('translation_domain', 'DashboardBundle');

        $menu->addChild(
            'dashboard.actions.new_entry',
            array(
                'route' => '_member_new', // @todo: przerobić na route '_entrance_add'
                "extras" => array("icon" => 'icomoon-icon-users'),
                'linkAttributes' => array(
                    "class" => 'tipB',
                )
            )
        )->setExtra('translation_domain', 'DashboardBundle');

        $menu->addChild(
            'dashboard.actions.new_voucher_sale',
            array(
                'route' => '_member_new', // @todo: przerobić na route '_voucher_new'
                "extras" => array("icon" => 'icomoon-icon-users'),
                'linkAttributes' => array(
                    "class" => 'tipB',
                )
            )
        )->setExtra('translation_domain', 'DashboardBundle');

        $menu->addChild(
            'dashboard.actions.calendar',
            array(
                'route' => '_schedule_calendar',
                "extras" => array("icon" => 'icomoon-icon-users'),
                'linkAttributes' => array(
                    "class" => 'tipB',
                )
            )
        )->setExtra('translation_domain', 'DashboardBundle');

        return $menu;
    }
}
