<?php
namespace Gyman\Bundle\AppBundle\Menu;

use Gyman\Bundle\AppBundle\Entity\Member;
use Gyman\Bundle\AppBundle\Entity\Voucher;
use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class MemberBuilder
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
        $member = $request->get('member');

        if ($member) {
            /**
             * @var Voucher $voucher
             */
            $voucher = $member->currentVoucher();
        }

        if (!$this->context->isGranted('ROLE_USER')) {
            return $menu;
        }

        $menu->setChildrenAttribute('class', 'nav nav-tabs');

        $menu->addChild('member.modal.tab.details_label', [
                'uri'            => '#detailsPane',
                'extras'         => ['icon' => 'icomoon-icon-users'],
                'linkAttributes' => [
                    'data-toggle' => 'tab',
                ],
                'attributes' => [
                    'class' => 'active',
                ],
        ])->setExtra('translation_domain', 'GymanAppBundle');

        if ($member) {
            $menu->addChild(
                'member.modal.tab.voucher_label',
                [
                    'uri'            => '#voucherPane',
                    'extras'         => ['icon' => 'icomoon-icon-users'],
                    'linkAttributes' => [
                        'class'       => '',
                        'data-toggle' => 'tab',
                    ],
                ]
            )->setExtra('translation_domain', 'GymanAppBundle');
        }

//        if ($member) {
//            $menu->addChild(
//                'member.modal.tab.history_label',
//                [
//                    'uri'            => '#historyPane',
//                    'extras'         => ['icon' => 'icomoon-icon-users'],
//                    'linkAttributes' => [
//                        'class'       => '',
//                        'data-toggle' => 'tab',
//                    ],
//                    'attributes' => [
//                        'class' => '',
//                    ],
//                ]
//            )->setExtra('translation_domain', 'GymanAppBundle');
//        }

        $menu->addChild(
            'member.modal.tab.extras_label',
            [
                'uri'            => '#additionalsPane',
                'extras'         => ['icon' => 'icomoon-icon-users'],
                'linkAttributes' => [
                    'class'       => '',
                    'data-toggle' => 'tab',
                ],
                'attributes' => [
                    'class' => '',
                ],
            ]
        )->setExtra('translation_domain', 'GymanAppBundle');

        return $menu;
    }

    public function picture()
    {
        $menu = $this->factory->createItem('root');

        if (!$this->context->isGranted('ROLE_USER')) {
            return $menu;
        }

        $menu->setChildrenAttribute('class', 'nav nav-tabs');
        $menu->setChildrenAttribute('id', 'uploadAvatar');

        $menu->addChild(
            'member.modal.tab.picture_label',
            [
                'uri'            => '#filePane',
                'extras'         => ['icon' => 'icomoon-icon-database'],
                'linkAttributes' => [
                    'class'       => '',
                    'data-toggle' => 'tab',
                ],
                'attributes' => [
                    'class' => 'active',
                ],
            ]
        )->setExtra('translation_domain', 'GymanAppBundle');

//        $menu->addChild(
//            'member.modal.tab.camera_label',
//            [
//                'uri'            => '#webcamDiv',
//                'extras'         => ['icon' => 'icomoon-icon-camera'],
//                'linkAttributes' => [
//                    'class'       => '',
//                    'data-toggle' => 'tab',
//                ],
//                'attributes' => [
//                    'class' => '',
//                ],
//            ]
//        )->setExtra('translation_domain', 'GymanAppBundle');

        return $menu;
    }
}
