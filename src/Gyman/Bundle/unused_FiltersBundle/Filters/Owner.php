<?php
namespace Gyman\Bundle\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;
use Symfony\Component\Security\Core\SecurityContext;

class Owner extends AbstractSubfilter
{
    /**
     * @var SecurityContext
     */
    private $securityContext;

    /**
     * @param SecurityContext $securityContext
     */
    public function setSecurityContext(SecurityContext $securityContext)
    {
        $this->securityContext = $securityContext;
    }

    public function apply(QueryBuilder $queryBuilder)
    {
        $queryBuilder->andWhere('c.owner = :owner');
        $queryBuilder->setParameters([
            'owner', $this->securityContext->getToken()->getUser(),
        ]);
    }
}
