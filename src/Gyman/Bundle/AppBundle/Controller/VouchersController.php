<?php
namespace Gyman\Bundle\AppBundle\Controller;

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
        
        $creditEntries = $member->entries()->filter(function(Entry $entry){
            return $entry->isType(Entry::TYPE_CREDIT);
        });

        $creditEntriesCount = count($creditEntries);

        if(!$creditEntries->isEmpty()) {
            $this->addFlash('creditEntries', $this->get("translator")->transChoice(
                'flash.member_has_credit_entries',
                $creditEntriesCount,
                [
                    '%creditEntriesCount%' => $creditEntriesCount
                ]
            ));
        }

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $command = $form->getData();
                $this->get('gyman.vouchers.create_voucher')->handle($command, $this->getUser());
                $this->addFlash('success', 'flash.voucher_added.success');

                return $this->redirectToRoute('gyman_member_edit', ['id' => $member->id()]);
            } else {
                $this->addFlash('error', 'flash.voucher_added.errors');
            }
        }

        return [
            'form' => $form->createView(),
            'creditEntries' => $creditEntries
        ];
    }

    /**
     * @Route("/{id}/close", name="gyman_vouchers_close")
     * @ParamConverter("voucher", class="Gyman:Voucher")
     */
    public function closeAction(Request $request, Voucher $voucher)
    {
        $this->get('gyman.vouchers.close_voucher')->close($voucher, $this->getUser());

        return $this->redirectToRoute('gyman_member_edit', ['id' => $voucher->member()->id()]);
    }

    /**
     * @param Member $member
     * @Template()
     */
    public function renderHistoryAction(Member $member)
    {
        return [
            'vouchers' =>$this->get('gyman.vouchers.repository')->findByMember($member, ['startDate' => 'DESC'])
        ];
    }
}
