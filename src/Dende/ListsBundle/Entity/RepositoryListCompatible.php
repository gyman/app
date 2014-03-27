<?php

namespace Dende\ListsBundle\Entity;

use Doctrine\ORM\QueryBuilder;

interface RepositoryListCompatible {

    public function getQuery();

    public function getTotalCount();

    public function getPaginator(QueryBuilder $query);
}
