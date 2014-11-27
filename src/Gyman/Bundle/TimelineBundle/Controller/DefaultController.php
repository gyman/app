<?php

namespace Gyman\Bundle\TimelineBundle\Controller;

use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\DefaultBundle\Lib\Globals;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Bundle\UserBundle\Entity\User;
use Spy\TimelineBundle\Driver\ORM\ActionManager;
use Spy\TimelineBundle\Driver\ORM\TimelineManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="gyman_timeline_index")
     * @Template()
     */
    public function timelineAction(Request $request, $subject = null)
    {
        if (!$subject) {
            $subject = $this->get("session")->get(
                Globals::CURRENT_CLUB_SESSION_KEY
            );
        }

        if (
            false === $subject instanceof Member &&
            false === $subject instanceof User &&
            false === $subject instanceof Club
        ) {
            throw new Exception("Unsupported subject class");
        }

        /**
         * @var $actionManager ActionManager
         */
        $actionManager = $this->get('spy_timeline.action_manager');

        /**
         * @var $timelineManager TimelineManager
         */
        $timelineManager = $this->get('spy_timeline.timeline_manager');

        $subject = $actionManager->findOrCreateComponent($subject);
        
        $timeline = $timelineManager->getTimeline($subject);

        return array(
            'timeline' => $timeline,
        );
    }
}
