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

        $menu->setChildrenAttributes(["id" => "dashboardActionMenu"]);


        $menu->addChild(
            'dashboard.actions.sell',
            [
                'route' => '_member_new',
                "extras" => ["icon" => 'icomoon-icon-users'],
                'linkAttributes' => [
                    "class" => 'btn btn-block btn-large disabled openUrlInModal btn-primary',
                    "id" => "actionSell"
                ]
            ]
        )->setExtra('translation_domain', 'DashboardBundle');

        $menu->addChild(
            'dashboard.actions.new_entry',
            [
                'route' => '_member_new',
                "extras" => ["icon" => 'icomoon-icon-users'],
                'linkAttributes' => [
                    "class" => 'btn btn-block btn-large disabled openUrlInModal btn-primary',
                    "id" => "actionEntry"
                ]
            ]
        )->setExtra('translation_domain', 'DashboardBundle');

        $menu->addChild(
            'dashboard.actions.new_voucher_sale',
            [
                'route' => '_member_new',
                "extras" => ["icon" => 'icomoon-icon-users'],
                'linkAttributes' => [
                    "class" => 'btn btn-block btn-large disabled openUrlInModal btn-primary',
                    "id" => "actionVoucher"
                ]
            ]
        )->setExtra('translation_domain', 'DashboardBundle');

        $menu->addChild(
            'dashboard.actions.new_member',
            [
                'route' => '_member_new',
                "extras" => ["icon" => 'icomoon-icon-users'],
                'linkAttributes' => [
                    "class" => 'btn btn-block btn-large btn-primary createNewMember openUrlInModal',
                    "id" => "actionMember"
                ]
            ]
        )->setExtra('translation_domain', 'DashboardBundle');

        $menu->addChild(
            'dashboard.actions.calendar',
            array(
                'route' => '_schedule_calendar',
                "extras" => array("icon" => 'icomoon-icon-users'),
                'linkAttributes' => array(
                    "class" => 'btn btn-block btn-large btn-primary',
                    "id" => "actionCalendar"
                )
            )
        )->setExtra('translation_domain', 'DashboardBundle');

        return $menu;
    }
}
