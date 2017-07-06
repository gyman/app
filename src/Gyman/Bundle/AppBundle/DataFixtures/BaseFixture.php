<?php
namespace Gyman\Bundle\TestBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Yaml\Yaml;

class BaseFixture extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    protected $container;
    protected $manager;

    protected $dir = __DIR__;

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     *
     * @api
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param ObjectManager $manager
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        $file = $this->translateClassToFilename($this);
        $value = Yaml::parse(file_get_contents($this->dir . '/../Yaml/' . $file));

        foreach ($value as $key => $params) {
            $object = $this->insert($params);
        die(var_dump(get_class($object)));
            $this->addReference($key, $object);
            $this->manager->persist($object);
        }



        $this->manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }

    /**
     * @param $params
     * @throws \Exception
     */
    public function insert($params)
    {
        throw new \Exception('Must implement this method!');
    }

    /**
     * @param $object
     * @return string
     */
    public function translateClassToFilename($object)
    {
        $classnameArray = explode('\\', get_class($object));
        $class = array_pop($classnameArray);
        $filename = strtolower(substr($class, 0, strpos($class, 'Data'))) . '.yml';

        return $filename;
    }
}
