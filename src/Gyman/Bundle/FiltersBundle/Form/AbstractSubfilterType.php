<?php

namespace Gyman\Bundle\FiltersBundle\Form;

use Symfony\Component\Form\AbstractType;

abstract class AbstractSubfilterType extends AbstractType implements SubfilterTypeInterface
{

    /**
     * types - defines also a methods called in each filter
     */
    const TYPE_GT = "gt";
    const TYPE_LT = "lt";
    const TYPE_BETWEEN = "between";
    const TYPE_NOT = "not";
    const TYPE_EQ = "eq";

    /**
     * labels for each type
     */
    const LABEL_GT = "większe niż";
    const LABEL_LT = "mniejsze niż";
    const LABEL_BETWEEN = "pomiędzy";
    const LABEL_NOT = "inny niż";
    const LABEL_EQ = "równy";
}
