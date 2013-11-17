<?php

namespace Gyman\Bundle\DefaultBundle\Request;

use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;

class ArrayCollectionConverter implements ParamConverterInterface
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function apply(Request $request, ConfigurationInterface $configuration)
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
//        $user = $this->getSecurityContext()->getToken()->getUser();

        if (!$finder = $options['finder']) {
            // Create a new default query builder with WHERE user_id clause
            $builder = $repo->createQueryBuilder('m');
        } else {
            // Call finder method on repository
            $builder = $repo->$finder();
        }

        $limit = isset($options['limit']) ? $options['limit'] : 10;

        // Edit the builder and add WHERE IN $items clause
        $alias = $builder->getRootAlias() . "." . $options['field'];

        $wherein = $builder->expr()->like($alias, "'%{$queredText}%'");

        $builder->setMaxResults($limit);

        $result = $builder->andwhere($wherein)->getQuery()->getResult();

        // Set request attribute and we're done
        $request->attributes->set($name, new ArrayCollection($result));
    }

    public function supports(ConfigurationInterface $configuration)
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
            array(
            'entity'    => null,
            'finder'    => null,
            'field'     => 'id',
            'delimiter' => ','
                ), $configuration->getOptions()
        );
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEntityManager()
    {
        return $this->container->get('doctrine.orm.default_entity_manager');
    }

    /**
     * @return \Symfony\Component\Security\Core\SecurityContext
     */
    protected function getSecurityContext()
    {
        return $this->container->get('security.context');
    }
}
