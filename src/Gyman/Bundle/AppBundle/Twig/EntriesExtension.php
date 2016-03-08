<?php
namespace Gyman\Bundle\AppBundle\Twig;

use Dende\Calendar\Domain\Calendar\Event\Occurrence;
use Gyman\Application\Repository\EntryRepositoryInterface;
use Gyman\Domain\Entry;

/**
 * Class EntriesExtension
 * @package Gyman\Bundle\AppBundle\Twig
 */
class EntriesExtension extends \Twig_Extension
{
    /**
     * @var EntryRepositoryInterface
     */
    private $entryRepository;

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
     * @return integer
     */
    public function entriesCount(Occurrence $occurrence)
    {
        return count($this->entryRepository->findByOccurrence($occurrence));
    }

    /**
     * @param Occurrence $occurrence
     * @return Entry[]
     */
    public function getEntries(Occurrence $occurrence)
    {
        return $this->entryRepository->findByOccurrence($occurrence);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'entries_extension';
    }

    /**
     * @param EntryRepositoryInterface $repository
     */
    public function setEntryRepository(EntryRepositoryInterface $repository)
    {
        $this->entryRepository = $repository;
    }
}
