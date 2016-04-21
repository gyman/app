<?php

namespace Gyman\Bundle\LandingPageBundle\Controller;

use Gyman\Application\Command\CreateClubCommand;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="gyman_landing_index")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $command = new CreateClubCommand();
        $form = $this->createForm('create_club', $command);

        if($request->isMethod("POST")) {
            $form->handleRequest($request);
            if($form->isValid()) {
                $data = $form->getData();
                $this->get("tactician.commandbus")->handle($data);

                $user = $this->getDoctrine()->getRepository("UserBundle:User")->findOneBy([
                    "email" => $data->email
                ]);

                $token = new UsernamePasswordToken($user, null, "main", $user->getRoles());
                $this->get("security.token_storage")->setToken($token);

                $event = new InteractiveLoginEvent($request, $token);
                $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);

                $this->addFlash("success", "user.created");

                return $this->redirect(sprintf(
                    "%s://%s.%s%s",
                    $request->getScheme(),
                    $data->subdomain,
                    $this->getParameter("base_url"),
                    $this->generateUrl("gyman_settings", [], Router::ABSOLUTE_PATH)
                ));
            } else {
//                $this->addFlash();
            }
        }

        return $this->render('GymanLandingPageBundle:Default:index.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
