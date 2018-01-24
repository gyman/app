<?php

namespace Gyman\Bundle\AdminBundle\Listener;


use Dende\MultitenancyBundle\Manager\TenantManager;
use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\ClubBundle\Entity\ClubRepository;
use Gyman\Bundle\ClubBundle\Entity\Subdomain;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\RouterInterface;

class PreListListener
{

    /** @var TenantManager */
    private $tenantManager;

    /** @var RouterInterface */
    private $router;

    /** @var Session */
    private $session;

    /** @var ClubRepository */
    private $clubRepository;

    public function __construct(Session $session, TenantManager $tenantManager, RouterInterface $router, ClubRepository $clubRepository)
    {
        $this->session = $session;
        $this->tenantManager = $tenantManager;
        $this->router = $router;
        $this->clubRepository = $clubRepository;
    }

    public function onPreListEvent(GenericEvent $event) {
        /** @var Club $club */
        $club = $this->session->get("club");

        if($club === null) {
            $club = $this->clubRepository->findOneBy([]);
            $this->session->set("club", $club);
        }

        $subdomain = $club->subdomain();

        $this->router->getContext()->setParameter('_subdomain', $subdomain->name());

        $this->tenantManager->switchConnection('tenant', $subdomain->name());
    }
}