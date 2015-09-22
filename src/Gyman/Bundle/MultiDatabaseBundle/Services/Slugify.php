<?php
namespace Gyman\Bundle\MultiDatabaseBundle\Services;

class Slugify
{
    private $separator = '_';

    public function convert($string)
    {
        return strtolower(
            trim(
                preg_replace(
                    '~[^0-9a-z]+~i',
                    $this->separator,
                    html_entity_decode(
                        preg_replace(
                            '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i',
                            '$1',
                            htmlentities(
                                $string,
                                ENT_QUOTES,
                                'UTF-8'
                            )
                        ),
                        ENT_QUOTES,
                        'UTF-8'
                    )
                ),
                $this->separator
            )
        );
    }
}
