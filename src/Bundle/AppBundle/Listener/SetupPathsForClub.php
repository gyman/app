<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Listener;

use Dende\MultitenancyBundle\Event\PostSwitchConnection;
use Gyman\Bundle\ClubBundle\Entity\ClubRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Twig_Environment;

class SetupPathsForClub
{
    /**
     * @var ClubRepository
     */
    private $clubRepository;

    /**
     * @var array|string[]
     */
    private $parameters = [
        'no_image'         => null,
        'gallerydirectory' => null,
        'gallerypath'      => null,
    ];

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var Twig_Environment
     */
    private $twig;

    /**
     * SetupPathsForClub constructor.
     *
     * @param ClubRepository   $clubRepository
     * @param SessionInterface $session
     * @param Twig_Environment $twig
     * @param array|\string[]  $parameters
     */
    public function __construct(ClubRepository $clubRepository, Twig_Environment $twig, $parameters = [])
    {
        $this->clubRepository = $clubRepository;
        $this->parameters = $parameters;
        $this->twig = $twig;
    }

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(PostSwitchConnection $event)
    {
        $subdomainName = $event->getTenantId();
        $club = $this->clubRepository->findOneBySubdomain($subdomainName);
        $this->twig->addGlobal('club', $club);
    }
}
