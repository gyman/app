<?php

namespace Gyman\Bundle\EntriesBundle\Controller;

use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Bundle\EntriesBundle\Entity\Entry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use DateTime;

class DefaultController extends Controller
{
    /**
     * @Route("/new/member/{id}", name="_entrance_add")
     * @ParamConverter("member", class="MembersBundle:Member")
     * @Template()
     */
    public function openAction(Member $member)
    {
        $entryHandler = $this->get("gyman.entries.entry_handler");
        $response = $entryHandler->handleOpen($member);
        return $response;
    }

    /**
     * @Route("/{id}/close", name="_entry_close")
     * @ParamConverter("entry", class="EntriesBundle:Entry")
     * @Template()
     */
    public function closeAction(Entry $entry)
    {
        $entryHandler = $this->get("gyman.entries.entry_handler");
        $response = $entryHandler->handleClose($entry);
        return $response;
    }

    /**
     * @Route("/{id}/delete", name="_entry_delete")
     * @ParamConverter("entry", class="EntriesBundle:Entry")
     * @Template()
     */
    public function deleteAction(Entry $entry)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($entry);
        $entityManager->flush();

        return new JsonResponse(array("status" => "ok"));
    }

    /**
     * @Route("/{id}/edit", name="_entry_edit")
     * @ParamConverter("entry", class="EntriesBundle:Entry")
     * @Template()
     */
    public function editAction(Entry $entry, Request $request)
    {
        return array(
            "entry" => $entry
        );
    }

    /**
     * @Route("/quick/member/{barcode}", name="_entry_quickadd")
     * @ParamConverter("member", class="MembersBundle:Member")
     */
    public function quickSearchAction(Member $member)
    {
        return new RedirectResponse(
            $this->generateUrl("_entrance_add", ["id" => $member->getId()])
        );
    }

}
