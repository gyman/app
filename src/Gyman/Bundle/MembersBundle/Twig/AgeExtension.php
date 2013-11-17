<?php

namespace Gyman\Bundle\MembersBundle\Twig;

class AgeExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('age', array($this, 'ageFilter')),
        );
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
