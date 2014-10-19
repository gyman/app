<?php

namespace Gyman\Bundle\MembersBundle\Menu;

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
     */
    public function __construct(FactoryInterface $factory, SecurityContext $context)
    {
        $this->factory = $factory;
        $this->context = $context;

        if($context->getToken()) {
            $this->user = $context->getToken()->getUser();
        }
    }

    public function tabs()
    {
        $menu = $this->factory->createItem('root');

        if(!$this->context->isGranted("ROLE_USER")) {
            return $menu;
        }

        $menu->setChildrenAttribute("class", "nav nav-tabs");

        $menu->addChild('member.modal.tab.details_label',
            array(
                'link' => '#detailsPane',
                "extras" => array("icon" => 'icomoon-icon-users'),
                'linkAttributes' => array(
                    "class" => '',
                    'data-toggle' => 'tab'
                )
            )
        )->setExtra('translation_domain', 'MembersBundle');

        $menu->addChild('member.modal.tab.voucher_label',
            array(
                'link' => '#voucherPane',
                "extras" => array("icon" => 'icomoon-icon-users'),
                'linkAttributes' => array(
                    "class" => '',
                    'data-toggle' => 'tab'
                )
            )
        )->setExtra('translation_domain', 'MembersBundle');

        $menu->addChild('member.modal.tab.sales_label',
            array(
                'link' => '#sellPane',
                "extras" => array("icon" => 'icomoon-icon-users'),
                'linkAttributes' => array(
                    "class" => '',
                    'data-toggle' => 'tab'
                )
            )
        )->setExtra('translation_domain', 'MembersBundle');

        $menu->addChild('member.modal.tab.entries_label',
            array(
                'link' => '#entriesPane',
                "extras" => array("icon" => 'icomoon-icon-users'),
                'linkAttributes' => array(
                    "class" => '',
                    'data-toggle' => 'tab'
                )
            )
        )->setExtra('translation_domain', 'MembersBundle');

        $menu->addChild('member.modal.tab.extras_label',
            array(
                'link' => '#additionalsPane',
                "extras" => array("icon" => 'icomoon-icon-users'),
                'linkAttributes' => array(
                    "class" => '',
                    'data-toggle' => 'tab'
                )
            )
        )->setExtra('translation_domain', 'MembersBundle');

        return $menu;
    }
}
