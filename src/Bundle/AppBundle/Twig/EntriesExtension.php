<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Twig;

use Gyman\Domain\Calendar\Event\Occurrence;
use Gyman\Domain\Entry;

/**
 * Class EntriesExtension.
 */
class EntriesExtension extends \Twig_Extension
{
    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('entries_count', [$this, 'entriesCount']),
            new \Twig_SimpleFunction('get_entries', [$this, 'getEntries']),
        ];
    }

    /**
     * @param Occurrence $occurrence
     *
     * @return int
     */
    public function entriesCount(Occurrence $occurrence)
    {
        return $occurrence->entries()->count();
    }

    /**
     * @param Occurrence $occurrence
     *
     * @return Entry[]
     */
    public function getEntries(Occurrence $occurrence)
    {
        return $occurrence->entries();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'entries_extension';
    }
}
