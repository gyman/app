<?php
namespace Gyman\Bundle\AppBundle\Controller;

use Gyman\Bundle\AppBundle\Entity\Member;
use Gyman\Domain\Command\CloseEntryCommand;
use Gyman\Domain\Command\OpenEntryCommand;
use Gyman\Domain\Model\Entry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class VouchersController
 * @package Gyman\Bundle\AppBundle
 * @Route("/entries")
 */
class EntriesController extends Controller
{
    /**
     * @Route("/member/{id}/new", name="gyman_entry_new")
     * @Method({"GET", "POST"})
     * @ParamConverter("member", class="GymanAppBundle:Member")
     * @Template()
     */
    public function newAction(Request $request, Member $member)
    {
        $form = $this->createForm('gyman_entry_form', new OpenEntryCommand($member), [
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
            } else {
                $this->addFlash('error', 'flash.entry_opened.errors');
            }
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/{id}/close", name="gyman_entry_close")
     * @ParamConverter("entry", class="GymanAppBundle:Entry")
     */
    public function closeAction(Request $request, Entry $entry)
    {
        $command = CloseEntryCommand::createFromEntry($entry);
        $this->get('gyman.entries.close_entry')->handle($command, $this->getUser());
        $this->addFlash('success', 'flash.entry_closed.success');

        return $this->redirectToRoute('gyman_member_edit', ['id' => $entry->member()->id()]);
    }

    /**
     * @param Member $member
     * @Template()
     */
    public function renderHistoryAction(Member $member)
    {
        return [
            'entries' =>$this->get('gyman.entries.repository')->findByMember($member, ['startDate' => 'ASC'], 15)
        ];
    }
}
