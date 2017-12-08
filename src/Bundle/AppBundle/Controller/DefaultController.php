<?php
namespace Gyman\Bundle\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template("GymanAppBundle:Default:index.html.twig")
     */
    public function indexAction()
    {
        $csrfToken = null;

        if ($this->has('security.csrf.token_manager')) {
            $csrfToken = $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue();
        }

        return [
            "club" => $this->get('gyman.club.provider')->club(),
            "csrf_token" => $csrfToken
        ];
    }

    /**
     * @Route("/current-schedule")
     * @Template("GymanAppBundle:Default:currentSchedule.html.twig")
     */
    public function currentScheduleAction()
    {
        return [];
    }
}
