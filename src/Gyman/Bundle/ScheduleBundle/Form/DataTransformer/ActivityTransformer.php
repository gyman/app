<?php
namespace Gyman\Bundle\ScheduleBundle\Form\DataTransformer;

use Doctrine\Common\Persistence\ObjectManager;
use Gyman\Bundle\ScheduleBundle\Entity\Activity;
use Gyman\Bundle\ScheduleBundle\Entity\ActivityRepository;
use Symfony\Component\Form\DataTransformerInterface;

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
