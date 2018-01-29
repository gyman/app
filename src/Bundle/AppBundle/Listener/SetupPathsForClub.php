<?php
namespace Gyman\Bundle\AppBundle\Listener;

use Dende\MultidatabaseBundle\Services\SubdomainProviderInterface;
use Dende\MultitenancyBundle\Event\PostSwitchConnection;
use Gyman\Bundle\AppBundle\Globals;
use Gyman\Bundle\ClubBundle\Entity\ClubRepository;
use Gyman\Bundle\ClubBundle\Entity\Subdomain;
use ReflectionObject;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Routing\Router;
use Twig\ExtensionSet;
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
        $club = $this->clubRepository->findOneBySubdomain(new Subdomain($subdomainName));

        $r = new ReflectionObject($this->twig);
        $p = $r->getProperty('extensionSet');
        $p->setAccessible(true);

        /** @var ExtensionSet $extensionSet */
        $extensionSet = $p->getValue($this->twig);

        if(!$extensionSet->isInitialized() && !array_key_exists('club', $this->twig->getGlobals())) {
            $this->twig->addGlobal('club', $club);
        }
    }
}