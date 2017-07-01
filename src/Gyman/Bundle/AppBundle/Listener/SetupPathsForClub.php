<?php
namespace Gyman\Bundle\AppBundle\Listener;

use Dende\MultidatabaseBundle\Services\SubdomainProviderInterface;
use Dende\MultitenancyBundle\Event\PostSwitchConnection;
use Gyman\Bundle\AppBundle\Globals;
use Gyman\Bundle\ClubBundle\Entity\ClubRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Routing\Router;
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
        'no_image' => null,
        'gallerydirectory' => null,
        'gallerypath' => null
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
     * @param ClubRepository $clubRepository
     * @param SessionInterface $session
     * @param Twig_Environment $twig
     * @param array|\string[] $parameters
     */
    public function __construct(ClubRepository $clubRepository, SessionInterface $session, Twig_Environment $twig, $parameters = [])
    {
        $this->clubRepository = $clubRepository;
        $this->parameters = $parameters;
        $this->session = $session;
        $this->twig = $twig;
    }

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(PostSwitchConnection $event)
    {
        if(!$this->session->isStarted()) {
            return;
        }

        $subdomainName = $event->getTenantId();


        $club = $this->clubRepository->findOneBySubdomain($subdomainName);

        Globals::setNoImage($this->parameters['no_image']);
        Globals::setGalleryDir($this->parameters['gallerydirectory'] . $subdomainName . DIRECTORY_SEPARATOR);
        Globals::setGalleryPath($this->parameters['gallerypath'] . $subdomainName . DIRECTORY_SEPARATOR);
        Globals::setSubdomain($subdomainName);

        $this->session->set('current_club', $club);
        $this->twig->addGlobal('club', $club);
    }
}