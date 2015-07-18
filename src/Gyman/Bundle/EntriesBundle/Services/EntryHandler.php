<?php

namespace Gyman\Bundle\EntriesBundle\Services;

use Gyman\Bundle\EntriesBundle\Entity\Entry;
use Gyman\Bundle\EntriesBundle\EntityManager\EntryManager;
use Gyman\Bundle\EntriesBundle\Exception\EntryFormInvalidException;
use Gyman\Bundle\EntriesBundle\Form\EntryType;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

class EntryHandler
{
    /**
     * @var EntryManager
     */
    private $entryManager;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var Router
     */
    private $router;

    /**
     * @var EntryType
     */
    private $entryType;

    /**
     * @var FormFactory
     */
    private $formFactory;

    /**
     * @var TwigEngine
     */
    private $templating;

    /**
     * @param RequestStack $requestStack
     */
    public function setRequestStack($requestStack)
    {
        $this->requestStack = $requestStack;

        $this->setRequest($this->requestStack->getCurrentRequest());
    }

    /**
     * @param Templating $templating
     */
    public function setTemplating(TwigEngine $templating)
    {
        $this->templating = $templating;
    }

    /**
     * @param EntryManager $entryManager
     */
    public function setEntryManager(EntryManager $entryManager)
    {
        $this->entryManager = $entryManager;
    }

    /**
     * @param EntryType $entryType
     */
    public function setEntryType(EntryType $entryType)
    {
        $this->entryType = $entryType;
    }

    /**
     * @param FormFactory $formFactory
     */
    public function setFormFactory(FormFactory $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    /**
     * @param Request $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param Router $router
     */
    public function setRouter(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @param Member $member
     * @return Response
     */
    public function handleOpen(Member $member)
    {
        if ($member->hasOpenedEntry()) {
            $lastEntry = $member->getLastEntry();

            return $this->redirectToCloseEntry($lastEntry);
        }

        $entry = $this->createEntry($member);

        $form = $this->createForm($this->entryType, $entry);

        try {
            if ($this->request->getMethod() == 'POST') {
                $this->handlePostedOpenEntryForm($form);
            }
        } catch (EntryFormInvalidException $e) {
            return $this->renderOpenEntryFormError($form);
        }

        return $this->renderOpenEntryForm($form);
    }

    /**
     * @param Entry $entry
     */
    public function handleClose(Entry $entry)
    {
        if ($this->request->getMethod() === 'POST') {
            $entry->setEndDate(new \DateTime('now'));
            $this->entryManager->save($entry);

            return new Response();
        }

        return $this->renderCloseEntryTemplate($entry);
    }

    public function redirectToCloseEntry(Entry $entry)
    {
        return new RedirectResponse(
            $this->router->generate('_entry_close', ['id' => $entry->getId()])
        );
    }

    public function createEntry(Member $member)
    {
        $entry = $this->entryManager->createNewEntry();
        $entry->setMember($member);

        $currentVoucher = $member->getCurrentVoucher();

        if ($currentVoucher) {
            $entry->setVoucher($currentVoucher);
        }

        return $entry;
    }

    public function handlePostedOpenEntryForm(Form $form)
    {
        $form->handleRequest($this->request);

        if (!$form->isValid()) {
            throw new EntryFormInvalidException('Invalid form');
        }

        /**
         * @var Entry $entry
         */
        $entry = $form->getData();

        if ($entry->getEntryType() != 'voucher') {
            $entry->setVoucher(null);
        }

        if ($entry->getEntryType() != 'paid') {
            $entry->setEntryPrice(null);
        }

        $this->entryManager->save($entry);
    }

    public function renderOpenEntryFormError($form)
    {
        $response = $this->renderOpenEntryForm($form);
        $response->setStatusCode(400);

        return $response;
    }

    public function renderOpenEntryForm(Form $form)
    {
        $response = new Response('Content', 200, ['content-type' => 'text/html']);

        $response->setContent($this->renderOpenEntryTemplate($form));

        return $response;
    }

    private function createForm($string, Entry $entry)
    {
        return $this->formFactory->create($string, $entry);
    }

    private function renderOpenEntryTemplate(Form $form)
    {
        /**
         * @var Member $member
         */
        $member = $form->getData()->getMember();
        $currentVoucher = $member->getCurrentVoucher();

        $template = $this->templating->render(
            'EntriesBundle:Default:new.html.twig',
            [
                'form'          => $form->createView(),
                'member'        => $member,
                'voucher'       => $currentVoucher,
                'currentEvents' => [], // $this->getDoctrine()->getRepository("ScheduleBundle:Occurence")->getCurrentEvents()
            ]
        );

        return $template;
    }

    private function renderCloseEntryTemplate(Entry $entry)
    {
        $response = new Response('Content', 200, ['content-type' => 'text/html']);

        $template = $this->templating->render(
            'EntriesBundle:Default:close.html.twig',
            [
                'entry'      => $entry,
                'minutesAgo' => $entry->getStartDate()->diff(new \DateTime('now')),
            ]
        );

        $response->setContent($template);

        return $response;
    }
}
