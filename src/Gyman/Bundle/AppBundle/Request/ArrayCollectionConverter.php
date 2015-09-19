<?php
namespace Gyman\Bundle\AppBundle\Request;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

class ArrayCollectionConverter implements ParamConverterInterface
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected $container;

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEntityManager()
    {
        return $this->entityManager;
    }

    public function apply(Request $request, ParamConverter $configuration)
    {
        $name = $configuration->getName();
        $options = $this->getOptions($configuration);

        // Se request attribute to an empty collection (as default)

        $queredText = $request->attributes->get($name);

        // If request parameter is missing or empty then return
        if (is_null($val = $request->get($name)) || strlen(trim($val)) === 0) {
            $request->attributes->set($name, new ArrayCollection());

            return;
        }

        $repo = $this->getEntityManager()->getRepository($options['entity']);

        if (!$finder = $options['finder']) {
            // Create a new default query builder with WHERE user_id clause
            $builder = $repo->createQueryBuilder('m');
        } else {
            // Call finder method on repository
            $builder = $repo->$finder();
        }

        $limit = isset($options['limit']) ? $options['limit'] : 10;

        // Edit the builder and add WHERE IN $items clause
        $fields = $options['field'];

        if (is_array($fields)) {
            $fieldsAreLike = $builder->expr()->orX();

            foreach ($fields as $field) {
                $alias = $builder->getRootAlias() . '.' . $field;

                $fieldsAreLike->add(
                    $builder->expr()->like($alias, "'%{$queredText}%'")
                );
            }
        } else {
            $alias = $builder->getRootAlias() . '.' . $fields;
            $fieldsAreLike = $builder->expr()->like($alias, "'%{$queredText}%'");
        }

        $builder->setMaxResults($limit);

        $result = $builder->andwhere($fieldsAreLike)->getQuery()->getResult();

        // Set request attribute and we're done
        $request->attributes->set($name, new ArrayCollection($result));
    }

    public function supports(ParamConverter $configuration)
    {
        $class = $configuration->getClass();

        // Check if class is ArrayCollection from Doctrine
        if ('Doctrine\Common\Collections\ArrayCollection' !== $class) {
            return false;
        }
        $options = $this->getOptions($configuration);
        $manager = $this->getEntityManager();

        // Check if $options['entity'] is actually a Dcontrine one
        try {
            $manager->getClassMetadata($options['entity']);

            return true;
        } catch (\Doctrine\ORM\Mapping\MappingException $e) {
            return false;
        }
    }

    protected function getOptions(ConfigurationInterface $configuration)
    {
        return array_replace(
            [
                'entity'    => null,
                'finder'    => null,
                'field'     => 'id',
                'delimiter' => ',',
            ],
            $configuration->getOptions()
        );
    }
}
