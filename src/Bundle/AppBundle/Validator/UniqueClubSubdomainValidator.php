<?php
namespace Gyman\Bundle\AppBundle\Validator;

use Gyman\Bundle\ClubBundle\Entity\ClubRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UniqueClubSubdomainValidator extends ConstraintValidator
{
    /** @var  ClubRepository */
    private $clubRepository;

    /**
     * UniqueClubSubdomainValidator constructor.
     * @param ClubRepository $clubRepository
     */
    public function __construct(ClubRepository $clubRepository)
    {
        $this->clubRepository = $clubRepository;
    }

    /**
     * @param mixed $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        if ($this->clubRepository->findOneBySubdomain($value)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('%string%', $value)
                ->addViolation();
        }
    }
}