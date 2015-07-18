<?php

namespace Gyman\Bundle\MultiDatabaseBundle\Controller;

use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\DefaultBundle\Lib\Globals;
use Gyman\Bundle\MultiDatabaseBundle\Connection\ConnectionWrapper;
use Gyman\Bundle\MultiDatabaseBundle\Services\CredentialsStorage;
use Gyman\Bundle\UserBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/switch-club-form", name="gyman_default_clubswitch")
     * @Method("GET")
     * @Template()
     * @return array
     */
    public function switchClubAction()
    {
        $formType = $this->get('gyman.default.form.club_switch');

        return [
            'form' => $this->createForm($formType)->createView(),
        ];
    }

    /**
     * @Route("/set-current-club/{club}", name="gyman_default_set_current_club")
     * @ParamConverter("club", class="ClubBundle:Club")
     */
    public function setCurrentClubAction(Club $club)
    {
        /* @var User $user */
        $user = $this->getUser();

        $user->setCurrentClub($club);

        $em = $this->getDoctrine()->getManager('default');
        $em->persist($user);
        $em->flush();

        $db = $club->getDatabase();

        $this->get('session')->set(
            Globals::CURRENT_CLUB_SESSION_KEY,
            $club
        );

        /* @var ConnectionWrapper $connection */
        $connection = $this->get('doctrine.dbal.club_connection');
        $connection->forceSwitch(
            $db[CredentialsStorage::PARAM_BASE],
            $db[CredentialsStorage::PARAM_USER],
            $db[CredentialsStorage::PARAM_PASS]
        );

        return new JsonResponse(['status' => 'ok']);
    }
}
