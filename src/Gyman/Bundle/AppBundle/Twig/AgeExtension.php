<?php

namespace Gyman\Bundle\AppBundle\Twig;

class AgeExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('age', [$this, 'ageFilter']),
        ];
    }

    public function ageFilter(\DateTime $date)
    {
        $age = $date->diff(new \DateTime('now'))->y;

        return $age;
    }

    public function getName()
    {
        return 'age_extension';
    }
}
