<?php

namespace Gyman\Bundle\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Gyman\Bundle\BaseBundle\Controller\BaseApiController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ClubController extends BaseApiController
{
    /**
     * Create a club
     * Method({"POST"})
     * @Rest\View()
     */
    public function postClubAction(Request $request)
    {
        $manager = $this->get('gyman.club.club_manager');

        $club = $manager->create();

        $form = $this->createForm(
            'gyman.club.club_form_type',
            $club,
            ['csrf_protection' => false]
        );

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $manager->save($club, true);
            $view = $this->createView($club, 201);

            $view->setHeader(
                'Content-Location',
                $this->generateUrl(
                    'gyman_api_get_club',
                    ['id' => $club->getId()],
                    true
                )
            );

            return $view;
        }

        return $this->createView($form, 422);
    }
}
