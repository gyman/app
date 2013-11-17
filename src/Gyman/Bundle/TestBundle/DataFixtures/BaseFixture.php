<?php
namespace Gyman\Bundle\TestBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;

class BaseFixture extends AbstractFixture implements OrderedFixtureInterface
{
    protected $manager;
    protected $fixtureFile;
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        $file = $this->translateClassToFilename($this);
        $value = Yaml::parse(file_get_contents(__DIR__."/Yaml/".$file));
        foreach ($value as $key => $params) {
            $object = $this->insert($params);
            $this->addReference($key, $object);
            $this->manager->persist($object);
        }

        $this->manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }

    public function insert($params)
    {
        throw new \Exception("Must implement this method!");
    }

    public function translateClassToFilename($object)
    {
        $classnameArray = explode("\\", get_class($object));
        $class = array_pop($classnameArray);
        $filename = strtolower(substr($class, 0, strpos($class, "Data"))) . ".yml";

        return $filename;
    }
}
