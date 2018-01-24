<?php

namespace Gyman\Bundle\AdminBundle\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Gyman\Bundle\AdminBundle\Form\SwitchClubType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends BaseAdminController
{
    public function renderSwitchClubFormAction(Request $request) : Response
    {
        $masterRequest = $this->get("request_stack")->getMasterRequest();

        $club = $request->getSession()->get("club");

        $form = $this->createForm(SwitchClubType::class, ["club" => $club], [
            "method" => Request::METHOD_POST,
            "action" => $this->generateUrl("admin_switch_club"),
            "redirectUrl" => $masterRequest->getRequestUri()
        ]);

        return $this->render('@Admin/Default/renderSwitchClubForm.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/switchClub", name="admin_switch_club")
     */
    public function switchClubAction(Request $request) : Response
    {
        $form = $this->createForm(SwitchClubType::class);

        $form->handleRequest($request);

        $data = $form->getData();

        $request->getSession()->set("club", $data["club"]);

        return $this->redirect($data["redirectUrl"]);
    }
}
