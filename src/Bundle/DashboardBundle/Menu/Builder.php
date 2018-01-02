<?php

declare(strict_types=1);

namespace Gyman\Bundle\DashboardBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class Builder
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * @var AuthorizationChecker
     */
    private $authorizationChecker;

    public function __construct(FactoryInterface $factory, AuthorizationCheckerInterface $checker)
    {
        $this->factory = $factory;
        $this->authorizationChecker = $checker;
    }

    public function actions()
    {
        $menu = $this->factory->createItem('root');

        if (!$this->authorizationChecker->isGranted('ROLE_MODERATOR')) {
            return $menu;
        }

        $menu->setChildrenAttributes(['id' => 'dashboardActionMenu']);

        $menu->addChild(
            'dashboard.actions.new_member',
            [
                'route'          => 'gyman_member_new',
                'extras'         => ['icon' => 'icomoon-icon-users'],
                'linkAttributes' => [
                    'class' => 'btn btn-block btn-large btn-primary createNewMember',
                    'id'    => 'actionMember',
                ],
            ]
        )->setExtra('translation_domain', 'DashboardBundle');

        $menu->addChild(
            'dashboard.actions.reports',
            [
                'route'          => 'gyman_reports_index',
                'extras'         => ['icon' => 'icomoon-icon-users'],
                'linkAttributes' => [
                    'class' => 'btn btn-block btn-large btn-primary',
                    'id'    => 'actionReports',
                ],
            ]
        )->setExtra('translation_domain', 'DashboardBundle');

        return $menu;
    }
}
