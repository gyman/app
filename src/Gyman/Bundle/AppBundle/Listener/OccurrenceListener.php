<?php
namespace Gyman\Bundle\AppBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Gyman\Domain\Calendar\Event\Occurrence;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class OccurrenceListener
 * @package Gyman\Bundle\AppBundle\Listener
 */
class OccurrenceListener
{
    /** @var  ContainerInterface */
    protected $container;

    /**
     * OccurrenceListener constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param Occurrence $occurrence
     * @param LifecycleEventArgs $eventArgs
     */
    public function postLoadHandler(Occurrence $occurrence, LifecycleEventArgs $eventArgs){
        $userRepository = $this->container->get("gyman.user.repository");

        if(is_null($occurrence->instructorId())) {
            return;
        }

        $user = $userRepository->find($occurrence->instructorId());
        $occurrence->setInstructor($user);
    }
}