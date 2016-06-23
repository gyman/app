<?php
namespace Gyman\Bundle\AppBundle\Controller\Rest;

use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Gyman\Application\Command\OpenEntryCommand;
use Gyman\Domain\Member;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
     * @ApiDoc()

     */

    public function cpostAction(Request $request)
    {
        /** @var Member $member */
        $member = $this->get("gyman.members.repository")->find($request->request->get("member"));
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
        } else {
            return $this->view($form);
        }
    }
}