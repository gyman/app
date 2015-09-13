<?php
namespace Gyman\Bundle\VouchersBundle\Controller;

use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Bundle\VouchersBundle\Entity\Voucher;
use Gyman\Bundle\VouchersBundle\Factory\VoucherFactory;
use Gyman\Bundle\VouchersBundle\Form\VoucherType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package Gyman\Bundle\VouchersBundle
 * @Route("/vouchers")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/member/{id}/new", name="gyman_voucher_new")
     * @Method({"GET", "POST"})
     * @ParamConverter("member", class="MembersBundle:Member")
     * @Template("VouchersBundle:Default:new.html.twig")
     */
    public function newAction(Request $request, Member $member)
    {
        $form = $this->createForm(
            'gyman_voucher_form',
            VoucherFactory::create(),
            [
                'action' => $this->generateUrl('gyman_voucher_new', ['id' => $member->id()]),
            ]
        );

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $voucher = $form->getData();
                $this->get('gyman.vouchers.sell_voucher')->sellVoucher($member, $voucher, $this->getUser());
                $this->addFlash('success', 'flash.voucher_added.success');

                return $this->redirectToRoute('gyman_member_edit', ['id' => $member->id()]);
            } else {
                $this->addFlash('error', 'flash.voucher_added.errors');
            }
        }

        return ['form' => $form->createView()];

//        if ($request->getMethod() == 'POST') {
//            $form->handleRequest($request);
//
//            if ($form->isValid()) {
//                $voucher->setAmountLeft($voucher->getAmount());
//                $voucherManager->save($voucher);
//            } else {
//                $response->setStatusCode(400);
//            }
//        }
//
//        return $response->setContent(
//            $this->renderView(
//                'VouchersBundle:Default:new.html.twig',
//                [
//                    'form'     => $form->createView(),
//                    'voucher'  => $voucher,
//                    'member'   => $member,
//                    'decision' => $decision,
//                ]
//            )
//        );
    }

    /**
     * Route("/new/member/{id}/decision/{decision}", name="_voucher_new", defaults={"decision" = null})
     * @ParamConverter("member", class="MembersBundle:Member")
     * @Template("VouchersBundle:Default:new.html.twig")
     */
    public function newOldAction(Request $request, Member $member, $decision)
    {
        $response = new Response('Content', 200, ['content-type' => 'text/html']);

        $voucherManager = $this->get('voucher_manager');
        $currentVoucher = $member->getCurrentVoucher();

        $decision = $request->get('decision');

        if ($decision == 'confirm' && $currentVoucher) {
            $voucherManager->closeVoucher($currentVoucher);
            $currentVoucher = null;
        }

        if ($currentVoucher && $decision != 'deny') {
            return $this->forward('VouchersBundle:Default:close', [
                'id' => $currentVoucher->getId(),
            ]);
        }

        if ($decision == 'confirm' || $decision == null) {
            $voucher = $voucherManager->createNewVoucherNow($member);
        } elseif ($decision == 'deny') {
            $voucher = $voucherManager->createNewVoucherAtEndDate($member);
        }

        /**
         * @todo move types to services
         */
        $form = $this->createForm(new VoucherType($this->get('activity_manager')), $voucher);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $voucher->setAmountLeft($voucher->getAmount());
                $voucherManager->save($voucher);
            } else {
                $response->setStatusCode(400);
            }
        }

        return $response->setContent(
            $this->renderView(
                'VouchersBundle:Default:new.html.twig',
                [
                    'form'     => $form->createView(),
                    'voucher'  => $voucher,
                    'member'   => $member,
                    'decision' => $decision,
                ]
            )
        );
    }

    /**
     * @Route("/edit/{id}", name="_voucher_edit")
     * @ParamConverter("voucher", class="VouchersBundle:Voucher")
     * @Template("VouchersBundle:Default:edit.html.twig")
     */
    public function editAction(Voucher $voucher, Request $request)
    {
        $response = new Response('Content', 200, ['content-type' => 'text/html']);

        $voucherManager = $this->get('voucher_manager');

        $form = $this->createForm(new VoucherType($this->get('activity_manager')), $voucher);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $voucher->setAmountLeft($voucher->getAmount());
                $voucherManager->save($voucher);
            } else {
                $response->setStatusCode(400);
            }
        }

        return $response->setContent(
            $this->renderView(
                'VouchersBundle:Default:edit.html.twig',
                [
                    'form'    => $form->createView(),
                    'voucher' => $voucher,
                    'member'  => $voucher->getMember(),
                ]
            )
        );
    }

    /**
     * @Route("/{id}/close", name="_voucher_close")
     * @ParamConverter("voucher", class="VouchersBundle:Voucher")
     * @Template("VouchersBundle:Default:close.html.twig")
     */
    public function closeAction(Request $request, Voucher $voucher)
    {
        $diff = $voucher->getEndDate()->diff(new \DateTime());

        return ['voucher'  => $voucher, 'leftDays' => $diff->days];
    }

    /**
     * @Route("/{id}/delete", name="_voucher_remove")
     * @ParamConverter("voucher", class="VouchersBundle:Voucher")
     * @Template()
     */
    public function deleteAction(Voucher $voucher, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $member = $voucher->getMember();
        $currentVoucher = $member->getCurrentVoucher();

        if ($currentVoucher && $currentVoucher->getId() == $voucher->getId()) {
            $member->setCurrentVoucher(null);
        }

        $em->persist($member);
        $em->remove($voucher);
        $em->flush();

        if ($request->isXmlHttpRequest()) {
            return new JsonResponse(['status' => 'ok']);
        }

        return $this->redirect($this->generateUrl('_vouchers_list'));
    }
}
