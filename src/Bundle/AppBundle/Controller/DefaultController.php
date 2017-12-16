<?php
namespace Gyman\Bundle\AppBundle\Controller;

use Gyman\Bundle\ClubBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

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

    /**
     * @Route("/login-post-register/{id}", name="gyman_app_login_after_registration")
     * @param Request $request
     * @param User $user
     * @return Response
     * @ParamConverter("user", class="ClubBundle:User")
     */
    public function loginAfterRegistrationAction(User $user, Request $request)
    {
        $token = new UsernamePasswordToken($user, $user->getPassword(), "main", $user->getRoles());
        $this->get("security.token_storage")->setToken($token);

        $event = new InteractiveLoginEvent($request, $token);
        $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);

        return $this->redirect($this->generateUrl("gyman_settings", [], Router::ABSOLUTE_PATH));
    }
}
