<?php
namespace Gyman\Bundle\AppBundle\Controller\Rest;

use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Gyman\Application\Command\OpenEntryCommand;
use Gyman\Domain\Member;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class EntryController
 * @package Gyman\Bundle\AppBundle\Controller\Rest
 * @RouteResource("Entry", pluralize=false)
 */
class EntryController extends FOSRestController
{

    /**
     * @param Request $request
     * @return View view instance
     *
     * @View()
     * ApiDoc()

     */

    public function cpostAction(Request $request)
    {
        /** @var Member $member */
        $member = $this->get("gyman.members.repository")->find($request->request->get("member"));

        if(is_null($member)) {
            $this->addFlash('error', 'User not found');
            return;
        }

        $request->request->remove("member");

        $command = new OpenEntryCommand($member);
        $command->startDate = new \DateTime();

        $form = $this->createForm('gyman_entry_form_rest', $command, [
            "csrf_protection" => false
        ]);

        $form->handleRequest($request);

        if ($form->isValid()) {
            /** @var OpenEntryCommand $command */
            $command = $form->getData();
            $this->get('gyman.entries.open_entry')->handle($command, $this->getUser());
            $this->addFlash('success', 'User added to occurrence');
        } else {
            $this->addFlash('error', 'Error adding user to occurrence');
            return $this->view($form);
        }
    }
}