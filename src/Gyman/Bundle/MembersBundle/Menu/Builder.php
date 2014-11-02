<?php

namespace Gyman\Bundle\MembersBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Bundle\VouchersBundle\Entity\Voucher;

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
     * @var Member
     */
    private $member;

    /**
     * @param Member $member
     */
    public function setMember(Member $member)
    {
        $this->member = $member;
    }

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

    public function tabs(Request $request)
    {
        $menu = $this->factory->createItem('root');

        /**
         * @var Member $member
         */
        $member = $request->get("member");

        if ($member) {
            /**
             * @var Voucher $voucher
             */
            $voucher = $member->getCurrentVoucher();
        }

        if (!$this->context->isGranted("ROLE_USER")) {
            return $menu;
        }

        $menu->setChildrenAttribute("class", "nav nav-tabs");

        $menu->addChild('member.modal.tab.details_label', [
                'uri' => '#detailsPane',
                "extras" => ["icon" => 'icomoon-icon-users'],
                'linkAttributes' => [
                    'data-toggle' => 'tab'
                ],
                "attributes" => [
                    'class' => 'active'
                ]
        ])->setExtra('translation_domain', 'MembersBundle');

        if ($member && $voucher) {
            $menu->addChild(
                'member.modal.tab.voucher_label',
                [
                    'uri' => '#voucherPane',
                    "extras" => ["icon" => 'icomoon-icon-users'],
                    'linkAttributes' => [
                        "class" => '',
                        'data-toggle' => 'tab'
                    ]
                ]
            )->setExtra('translation_domain', 'MembersBundle');
        }

        if ($member) {
            $menu->addChild(
                'member.modal.tab.sales_label',
                [
                    'uri' => '#sellPane',
                    "extras" => ["icon" => 'icomoon-icon-users'],
                    'linkAttributes' => [
                        "class" => '',
                        'data-toggle' => 'tab'
                    ],
                    "attributes" => [
                        'class' => ''
                    ]
                ]
            )->setExtra('translation_domain', 'MembersBundle');
        }

        if ($member) {
            $menu->addChild(
                'member.modal.tab.entries_label',
                [
                    'uri' => '#entriesPane',
                    "extras" => ["icon" => 'icomoon-icon-users'],
                    'linkAttributes' => [
                        "class" => '',
                        'data-toggle' => 'tab'
                    ],
                    "attributes" => [
                        'class' => ''
                    ]
                ]
            )->setExtra('translation_domain', 'MembersBundle');
        }

        $menu->addChild(
            'member.modal.tab.extras_label',
            [
                'uri' => '#additionalsPane',
                "extras" => ["icon" => 'icomoon-icon-users'],
                'linkAttributes' => [
                    "class" => '',
                    'data-toggle' => 'tab'
                ],
                "attributes" => [
                    'class' => ''
                ]
            ]
        )->setExtra('translation_domain', 'MembersBundle');

        return $menu;
    }

    public function picture()
    {
        $menu = $this->factory->createItem('root');

        if (!$this->context->isGranted("ROLE_USER")) {
            return $menu;
        }

        $menu->setChildrenAttribute("class", "nav nav-tabs");
        $menu->setChildrenAttribute("id", "uploadAvatar");

        $menu->addChild(
            'member.modal.tab.picture_label',
            [
                'uri' => '#filePane',
                "extras" => ["icon" => 'icomoon-icon-database'],
                'linkAttributes' => [
                    "class" => '',
                    'data-toggle' => 'tab'
                ],
                "attributes" => [
                    'class' => 'active'
                ]
            ]
        )->setExtra('translation_domain', 'MembersBundle');

        $menu->addChild(
            'member.modal.tab.camera_label',
            [
                'uri' => '#webcamDiv',
                "extras" => ["icon" => 'icomoon-icon-camera'],
                'linkAttributes' => [
                    "class" => '',
                    'data-toggle' => 'tab'
                ],
                "attributes" => [
                    'class' => ''
                ]
            ]
        )->setExtra('translation_domain', 'MembersBundle');

        return $menu;
    }
}
