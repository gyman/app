<?php

namespace Gyman\Bundle\ScheduleBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Gyman\Bundle\ScheduleBundle\Entity\Activity;
use Doctrine\Common\Persistence\ObjectManager;
use Gyman\Bundle\ScheduleBundle\Entity\ActivityRepository;

class ActivityTransformer implements DataTransformerInterface
{
    /**
     * @var ActivityRepository
     */
    private $activityRepository;

    /**
     * @param ObjectManager $om
     */
    public function __construct(ActivityRepository $repository)
    {
        $this->activityRepository = $repository;
    }

    /**
     *
     * @param  Activity $activity
     * @return string
     */
    public function transform($activity = null)
    {
        if ($activity) {
            return $activity->getId();
        }
    }

    /**
     *
     * @param  string   $id
     * @return Activity | null
     */
    public function reverseTransform($id = null)
    {
        if (is_numeric($id)) {
            return $this->activityRepository->findOneById($id);
        }
    }
}
