<?php

namespace Gyman\Bundle\EntriesBundle\Controller;

use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Bundle\EntriesBundle\Form\EntryType;
use Gyman\Bundle\EntriesBundle\Entity\Entry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use DateTime;

class DefaultController extends Controller
{
    /**
     * @Route("/quick/member/{barcode}", name="_entry_quickadd")
     * @ParamConverter("member", class="MembersBundle:Member")
     */
    public function quickSearchAction(Member $member)
    {
        return $this->forward("EntriesBundle:Default:new", array("id" => $member->getId()));
    }

    /**
     * @Route("/new/member/{id}", name="_entrance_add")
     * @ParamConverter("member", class="MembersBundle:Member")
     * @Template()
     */
    public function newAction(Member $member, Request $request)
    {
        if ($member->hasOpenedEntry()) {
            $lastEntry = $member->getLastEntry();

            return $this->forward("EntriesBundle:Default:close", array("id" => $lastEntry->getId()));
        }

        $response = new Response(
            'Content', 200, array('content-type' => 'text/html')
        );

        $entry = $this->get('entry_manager')->createNewEntry();
        $entry->setMember($member);

        $currentVoucher = $member->getCurrentVoucher();

        if ($currentVoucher) {
            $entry->setVoucher($currentVoucher);
        }

        $entryType = new EntryType($this->get("occurence_repository"));
        $form = $this->createForm($entryType, $entry);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                if ($form["entryType"]->getData() != "voucher") {
                    $entry->setVoucher(null);
                }

                if ($form["entryType"]->getData() != "paid") {
                    $entry->setEntryPrice(null);
                }

                $this->get('entry_manager')->save($entry);
            } else {
                $response->setStatusCode(400);
            }
        }

        return $response->setContent($this->renderView(
                "EntriesBundle:Default:new.html.twig",
                [
                    "form"          => $form->createView(),
                    "member"        => $member,
                    "voucher"       => $currentVoucher,
                    "currentEvents" => [] // $this->getDoctrine()->getRepository("ScheduleBundle:Occurence")->getCurrentEvents()
                ]
        ));
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
     * @Route("/{id}/close", name="_entry_close")
     * @ParamConverter("entry", class="EntriesBundle:Entry")
     * @Template()
     */
    public function closeAction(Entry $entry, Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getManager();
            $entry->setEndDate(new \DateTime());
            $em->persist($entry);
            $em->flush();
        }

        return array(
            "entry"      => $entry,
            "minutesAgo" => $entry->getStartDate()->diff(new DateTime())
        );
    }
}
