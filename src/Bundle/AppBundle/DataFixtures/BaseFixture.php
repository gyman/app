<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ReflectionClass;
use Symfony\Component\Yaml\Yaml;

/**
 * Class BaseFixture.
 */
abstract class BaseFixture extends AbstractFixture implements OrderedFixtureInterface
{
    protected $manager;
    protected $fixtureFile;

    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;
        $file = $this->translateClassToFilename($this);

        $class_info = new ReflectionClass($this);
        $dir = dirname($class_info->getFileName());

        $filename = $dir . '/../Yaml/' . $file;

        if (!is_file($filename) || !is_readable($filename)) {
            return;
        }

        $items = Yaml::parse(file_get_contents($filename));

        if (0 === count($items)) {
            return;
        }

        foreach ($items as $key => $params) {
            $object = $this->insert($params);
            $this->addReference($key, $object);
            $this->manager->persist($object);
        }

        $this->manager->flush();
    }

    public function getOrder(): int
    {
        return 1;
    }

    abstract public function insert(array $params = []);

    public function translateClassToFilename($object): string
    {
        $classnameArray = explode('\\', get_class($object));
        $class = array_pop($classnameArray);
        $filename = strtolower(substr($class, 0, strpos($class, 'Data'))) . '.yml';

        return $filename;
    }

    protected function getArrayOfReferences(array $array): array
    {
        $result = [];
        foreach ($array as $reference) {
            $result[] = $this->getReference($reference);
        }

        return $result;
    }
}
