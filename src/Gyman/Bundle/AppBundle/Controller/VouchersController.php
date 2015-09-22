<?php
namespace Gyman\Bundle\AppBundle\Controller;

use Gyman\Bundle\AppBundle\Entity\Member;
use Gyman\Bundle\AppBundle\Entity\Voucher;
use Gyman\Domain\Command\CreateVoucherCommand;
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
     * @ParamConverter("member", class="GymanAppBundle:Member")
     * @Template("GymanAppBundle:Vouchers:new.html.twig")
     */
    public function newAction(Request $request, Member $member)
    {
        $form = $this->createForm('gyman_voucher_form', new CreateVoucherCommand(), [
                'action' => $this->generateUrl('gyman_voucher_new', ['id' => $member->id()]),
        ]);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $command = $form->getData();
                $command->member = $member;

                $this->get('gyman.vouchers.create_voucher')->handle($command, $this->getUser());
                $this->addFlash('success', 'flash.voucher_added.success');

                return $this->redirectToRoute('gyman_member_edit', ['id' => $member->id()]);
            } else {
                $this->addFlash('error', 'flash.voucher_added.errors');
            }
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/{id}/close", name="gyman_vouchers_close")
     * @ParamConverter("voucher", class="GymanAppBundle:Voucher")
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
        return [];
    }
}
