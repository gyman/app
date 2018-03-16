<?php
namespace Gyman\Bundle\AppBundle\DataFixtures\Club\ORM;

use DateTime;
use Gyman\Calendar\Domain\Calendar\Event\Occurrence\OccurrenceDuration;
use Gyman\Bundle\AppBundle\DataFixtures\BaseFixture;
use Gyman\Domain\Calendar\Event\Occurrence;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class OccurrencesData extends BaseFixture implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function getOrder() : int
    {
        return 20;
    }

    public function insert(array $params = []) : Occurrence
    {
        $event = $this->getReference($params["event"]);

        return Occurrence::create(
            null,
            new DateTime($params["startDate"]),
            $event
        );
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function getContainer() : ContainerInterface
    {
        return $this->container;
    }
}
