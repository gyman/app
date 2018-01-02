<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Controller;

use DateTime;
use Gyman\Application\Command\CloseEntryCommand;
use Gyman\Application\Command\OpenEntryCommand;
use Gyman\Application\Exception\MemberHasNoLastEntryException;
use Gyman\Bundle\AppBundle\Form\EntryType;
use Gyman\Domain\Calendar\Event\Occurrence;
use Gyman\Domain\Entry;
use Gyman\Domain\Member;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class VouchersController.
 *
 * @Route("/entries")
 */
class EntriesController extends Controller
{
    /**
     * @Route("/member/{id}/new", name="gyman_entry_new")
     * @Method({"GET", "POST"})
     * @ParamConverter("member", class="Gyman:Member")
     * @Template("GymanAppBundle:Entries:createNewEntry.html.twig")
     *
     * @param Request $request
     * @param Member  $member
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function createEntryAction(Request $request, Member $member)
    {
        $form = $this->createForm(EntryType::class, new OpenEntryCommand($member), [
                'action' => $this->generateUrl('gyman_entry_new', ['id' => $member->id()]),
        ]);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                /** @var OpenEntryCommand $command */
                $command = $form->getData();
                $this->get('gyman.entries.open_entry')->handle($command, $this->getUser());
                $this->addFlash('success', 'flash.entry_opened.success');

                return $this->redirectToRoute('gyman_member_edit', ['id' => $member->id()]);
            }
            $this->addFlash('error', 'flash.entry_opened.errors');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/{id}/close", name="gyman_entry_close")
     * @ParamConverter("entry", class="Gyman:Entry")
     *
     * @param Request $request
     * @param Entry   $entry
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function closeAction(Request $request, Entry $entry)
    {
        $command = CloseEntryCommand::createFromEntry($entry);
        try {
            $this->get('tactician.commandbus')->handle($command);
        } catch (MemberHasNoLastEntryException $e) {
            $this->addFlash('error', 'flash.entry_closed.success');

            return $this->redirectToRoute('gyman_member_edit', ['id' => $entry->member()->id()]);
        }

        $this->addFlash('success', 'flash.entry_closed.success');

        return $this->redirectToRoute('gyman_member_edit', ['id' => $entry->member()->id()]);
    }

    /**
     * @param Member $member
     *
     * @return Response
     */
    public function renderHistoryAction(Member $member)
    {
        return $this->render('GymanAppBundle:Entries:renderHistory.html.twig', [
            'entries' => array_slice(
                $this->get('gyman.entries.repository')->findByMember($member, ['startDate' => 'DESC', 'createdAt' => 'DESC']),
                0,
                15
            ),
        ]);
    }

    /**
     * @Route("/quick-entry/occurrence/{occurrence}/member/{member}", name="gyman_entry_create_for_member")
     * @ParamConverter("occurrence", class="Gyman\Domain\Calendar\Event\Occurrence", options={"repository_method" = "findOneById"})
     * @ParamConverter("member", class="Gyman:Member")
     *
     * @param Member     $member
     * @param Occurrence $occurrence
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function quickCreateEntryAction(Member $member, Occurrence $occurrence)
    {
        $command = new OpenEntryCommand($member);
        $command->startDate = new DateTime();
        $command->entryType = null === $member->currentVoucher() ? Entry::TYPE_CREDIT : Entry::TYPE_VOUCHER;
        $command->occurrence = $occurrence;
        $command->voucher = $member->currentVoucher();
        $command->member = $member;
        $command->price = null;

        $this->get('gyman.entries.open_entry')->handle($command, $this->getUser());
        $this->addFlash('success', 'flash.entry_opened.success');

        return $this->redirectToRoute('gyman_dashboard_listClassMembers', ['id' => $occurrence->id()]);
    }

    /**
     * @Route("/quick-remove/occurrence/{occurrence}/member/{member}", name="gyman_entry_remove_from_occurrence")
     * @ParamConverter("occurrence", class="Gyman\Domain\Calendar\Event\Occurrence")
     * @ParamConverter("member", class="Gyman:Member")
     *
     * @param Member     $member
     * @param Occurrence $occurrence
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function quickRemoveEntryAction(Member $member, Occurrence $occurrence)
    {
        $this->get('gyman.app.remove_entry_from_occurrence')->remove($member, $occurrence);
        $this->addFlash('success', 'User removed from occurrence');

        return $this->redirectToRoute('gyman_dashboard_listClassMembers', ['id' => $occurrence->id()]);
    }

    /**
     * @Route("/quick-close/activity/{occurrence}", name="gyman_entries_close_for_occurrence")
     * @ParamConverter("occurrence", class="Gyman\Domain\Calendar\Event\Occurrence")
     *
     * @param Occurrence $occurrence
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function quickCloseEntriesAction(Occurrence $occurrence)
    {
        /** @var Entry[] $entries */
        $entries = $this->get('gyman.entries.repository')->findByOccurrence($occurrence);

        foreach ($entries as $entry) {
            $entry->closeEntry(new DateTime());
            $this->get('gyman.entries.repository')->save($entry);
        }

        $this->addFlash('success', 'All entries closed.');

        return $this->redirectToRoute('gyman_dashboard_listClassMembers', ['id' => $occurrence->id()]);
    }
}
