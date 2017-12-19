<?php

namespace Gyman\Bundle\LandingPageBundle\Controller;

use Gyman\Application\Command\CreateClubCommand;
use Gyman\Bundle\ClubBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="gyman_landing_index")
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $command = new CreateClubCommand();
        $form = $this->createForm('create_club', $command);

        if($request->isMethod("POST")) {
            $form->handleRequest($request);
            if($form->isValid()) {
                $command = $form->getData();
                $this->get("tactician.commandbus")->handle($command);

                /** @var User $user */
                $user = $this->getDoctrine()->getRepository(User::class)->findOneByUsername($command->username);
                $userId = $user->getId();

                $this->addFlash("success", "user.created");

                return $this->redirect(sprintf(
                    "%s://%s.%s%s",
                    $request->getScheme(),
                    $command->subdomain,
                    $this->getParameter("base_url"),
                    $this->generateUrl("gyman_app_login_after_registration", ["id" => $userId], Router::ABSOLUTE_PATH)
                ));

            } else {
                $this->addFlash('error', 'user.error_creating_user');
            }
        }

        return $this->render('GymanLandingPageBundle:Default:index.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
