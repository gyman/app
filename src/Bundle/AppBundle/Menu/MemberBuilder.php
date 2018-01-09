<?php
namespace Gyman\Bundle\AppBundle\Menu;

use Gyman\Domain\Member;
use Gyman\Domain\Voucher;
use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\SecurityContext;

class MemberBuilder
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * @var AuthorizationCheckerInterface
     */
    private $authorizationChecker;

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
    public function __construct(FactoryInterface $factory, AuthorizationCheckerInterface $checker)
    {
        $this->factory = $factory;
        $this->authorizationChecker = $checker;
    }

    public function tabs(RequestStack $requestStack)
    {
        $request = $requestStack->getMasterRequest();
        $menu = $this->factory->createItem('root');

        /**
         * @var Member $member
         * @todo - pobieranie membera z repo, nie z requesta!
         */
        $member = $request->get('member');

        if (!$this->authorizationChecker->isGranted('ROLE_MODERATOR')) {
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

            $menu->addChild(
                'member.modal.tab.entries_label',
                [
                    'uri'            => '#entriesPane',
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
        }

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

        if (!$this->authorizationChecker->isGranted('ROLE_USER')) {
            return $menu;
        }

        $menu->setChildrenAttribute('class', 'nav nav-tabs');
        $menu->setChildrenAttribute('id', 'uploadAvatar');

        $menu->addChild(
            'member.modal.tab.camera_label',
            [
                'uri'            => '#webcamDiv',
                'extras'         => ['icon' => 'icomoon-icon-camera'],
                'linkAttributes' => [
                    'class'       => '',
                    'data-toggle' => 'tab',
                ],
                'attributes' => [
                    'class' => 'active',
                ],
            ]
        )->setExtra('translation_domain', 'GymanAppBundle');

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
                    'class' => '',
                ],
            ]
        )->setExtra('translation_domain', 'GymanAppBundle');

        return $menu;
    }
}
