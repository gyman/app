<?php

namespace Gyman\Application\Handler;

use Dende\Calendar\Application\Repository\OccurrenceRepositoryInterface;
use Doctrine\ORM\EntityNotFoundException;
use Gyman\Application\Command\UpdateOccurrenceDetailsCommand;
use Gyman\Bundle\AppBundle\Repository\UserRepository;
use Gyman\Domain\Calendar\Event\Occurrence;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class UpdateOccurrenceDetailsHandler
{
    /** @var OccurrenceRepositoryInterface */
    private $occurrenceRepository;

    /** @var UserRepository */
    private $userRepository;

    /** @var EventDispatcher */
    private $eventDispatcher;

    /**
     * UpdateOccurrenceDetailsHandler constructor.
     * @param OccurrenceRepositoryInterface $occurrenceRepository
     * @param UserRepository $userRepository
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(OccurrenceRepositoryInterface $occurrenceRepository, UserRepository $userRepository, EventDispatcherInterface $eventDispatcher)
    {
        $this->occurrenceRepository = $occurrenceRepository;
        $this->userRepository = $userRepository;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function handle(UpdateOccurrenceDetailsCommand $command)
    {
        /** @var Occurrence $occurrence */
        $occurrence = $this->occurrenceRepository->findOneById($command->occurrenceId()->toString());

        if(null === $occurrence) {
            throw new EntityNotFoundException('Cant find occurrence');
        }

        if($instructor = $this->userRepository->findOneById($command->instructorId())) {
            $occurrence->assignInstructor($instructor);
        }

        $occurrence->updateSubject($command->subject());
        $occurrence->updateNote($command->note());

        $this->occurrenceRepository->update($occurrence);
    }
}