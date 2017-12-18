<?php

namespace Gyman\Bundle\AppBundle\Controller;

use Gyman\Application\Command\UpdateOccurrenceDetailsCommand;
use Gyman\Bundle\AppBundle\Form\UpdateOccurrenceDetailsType;
use Gyman\Domain\Calendar\Event\Occurrence;
use Gyman\Domain\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OccurrenceController extends Controller
{
    /**
     * @Route("/activity/{id}", name="gyman_dashboard_updateOccurrenceDetails")
     * @ParamConverter("occurrence", class="Gyman\Domain\Calendar\Event\Occurrence", options={"repository_method" = "findOneById"})
     */
    public function updateOccurrenceDetailsAction(Occurrence $occurrence, string $route = null) : Response
    {
        $request = $this->get("request_stack")->getCurrentRequest();

        $instructors = $this->get('gyman.user.repository')->getInstructors();

        $instructors = array_combine(array_map(function(User $instructor) : string {
            $name = $instructor->getFullname();
            return $name !== null ? $name : $instructor->getUsername();
        }, $instructors), array_map(function(User $instructor) : string {
            return $instructor->id()->toString();
        }, $instructors));

        $form = $this->createForm(UpdateOccurrenceDetailsType::class, new UpdateOccurrenceDetailsCommand(
            $occurrence->id(),
            $occurrence->instructor() ==! null ? $occurrence->instructor()->id() : null,
            $occurrence->subject(),
            $occurrence->note()
        ), ["instructors" => $instructors, "action" => $this->generateUrl("gyman_dashboard_updateOccurrenceDetails", [
            'id' => $occurrence->id()->toString()
        ]), "method" => Request::METHOD_POST]);

        if($request->isMethod(Request::METHOD_POST)) {

            $form->handleRequest($request);

            if($form->isValid()) {
                $this->get('tactician.commandbus')->handle($form->getData());
                $this->addFlash('success', 'flash.occurrence_updated.success');
            } else {
                $this->addFlash('error', 'flash.occurrence_updated.error');
            }

            return $this->redirectToRoute($route ?: 'gyman_dashboard_updateOccurrenceDetails', [
                'id' => $occurrence->id()->toString()
            ]);
        }

        return $this->render('@GymanApp/Occurrence/updateOccurrenceDetailsAction.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
