<?php
namespace Gyman\Bundle\AppBundle\Controller;

use Gyman\Application\Command\CloseVoucherCommand;
use Gyman\Application\Command\UpdateVoucherCommand;
use Gyman\Domain\Entry;
use Gyman\Domain\Member;
use Gyman\Domain\Voucher;
use Gyman\Application\Command\CreateVoucherCommand;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class VouchersController
 * @package Gyman\Bundle\AppBundle
 * @Route("/vouchers")
 */
class VouchersController extends Controller
{
    /**
     * @Route("/member/{id}/new", name="gyman_voucher_new")
     * @Method({"GET", "POST"})
     * @ParamConverter("member", class="Gyman:Member")
     * @Template("GymanAppBundle:Vouchers:new.html.twig")
     * @param Request $request
     * @param Member $member
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function newAction(Request $request, Member $member)
    {
        $command = new CreateVoucherCommand();
        $command->member = $member;

        $form = $this->createForm('gyman_voucher_form', $command, [
                'action' => $this->generateUrl('gyman_voucher_new', ['id' => $member->id()]),
                'memberId' => $member->id(),
                'member' => $member
        ]);
        
        $creditEntries = $member->filterCreditEntries();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $this->get("tactician.commandbus")->handle($form->getData());
                $this->addFlash('success', 'flash.voucher_added.success');

                return $this->redirectToRoute('gyman_member_edit', ['id' => $member->id()]);
            } else {
                $this->addFlash('error', 'flash.voucher_added.errors');
            }
        } else {
            if (!$creditEntries->isEmpty()) {
                $this->addFlash('creditEntries', $this->get("translator")->transChoice(
                    'flash.member_has_credit_entries',
                    count($creditEntries),
                    [
                        '%creditEntriesCount%' => count($creditEntries)
                    ]
                ));
            }
        }

        return [
            'form' => $form->createView(),
            'creditEntries' => $creditEntries,
            'member' => $member
        ];
    }

    /**
     * @Route("/{id}/close", name="gyman_vouchers_close")
     * @ParamConverter("voucher", class="Gyman:Voucher")
     */
    public function closeAction(Request $request, Voucher $voucher)
    {
        $command = new CloseVoucherCommand();
        $command->voucher = $voucher;
        $command->closingDate = new \DateTime();

        $this->get('tactician.commandbus')->handle($command);

        return $this->redirectToRoute('gyman_member_edit', ['id' => $voucher->member()->id()]);
    }

    /**
     * @param Member $member
     */
    public function renderHistoryAction(Member $member)
    {
        return $this->render("@GymanApp/Vouchers/renderHistory.html.twig", [
            'vouchers' =>$this->get('gyman.vouchers.repository')->findByMember($member, ['startDate' => 'DESC', 'createdAt' => 'DESC'])
        ]);
    }

    /**
     * @Route("/{id}/update", name="gyman_voucher_update")
     * @Method({"GET", "POST"})
     * @ParamConverter("voucher", class="Gyman:Voucher")
     * @Template("GymanAppBundle:Vouchers:update.html.twig")
     * @param Request $request
     * @param Voucher $voucher
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function updateAction(Request $request, Voucher $voucher)
    {
        $command = UpdateVoucherCommand::createFromVoucher($voucher);

        $form = $this->createForm('gyman_voucher_update_form', $command, [
            'action' => $this->generateUrl('gyman_voucher_update', ['id' => $voucher->id()]),
        ]);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $this->get("tactician.commandbus")->handle($form->getData());
//                $this->addFlash('success', 'flash.voucher_added.success');

                return $this->redirectToRoute('gyman_voucher_update', ['id' => $voucher->id()]);
            } else {
//                $this->addFlash('error', 'flash.voucher_added.errors');
            }
        }

        return [
            'form' => $form->createView(),
            'voucher' => $voucher
        ];
    }
}
