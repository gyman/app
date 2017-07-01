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

        if (!$this->context->isGranted('ROLE_USER')) {
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
            array(
                'route' => 'gyman_reports_index',
                "extras" => array("icon" => 'icomoon-icon-users'),
                'linkAttributes' => array(
                    "class" => 'btn btn-block btn-large btn-primary',
                    "id" => "actionReports"
                )
            )
        )->setExtra('translation_domain', 'DashboardBundle');

        return $menu;
    }
}
