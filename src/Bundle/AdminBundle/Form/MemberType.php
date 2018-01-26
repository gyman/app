<?php

namespace Gyman\Bundle\AdminBundle\Form;

use Gyman\Bundle\AppBundle\Repository\MemberRepository;
use Gyman\Domain\Member;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MemberType extends EntityType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'csrf_protection' => true,
            'class' => Member::class,
            'required' => false,
            'multiple' => false,
            'expanded' => false,
            'choice_label' => function(Member $member) : string{
                return sprintf("%s (%s)", $member->details()->fullName(), $member->id());
            },
            'choice_value' => 'id',
            'query_builder' => function(MemberRepository $repository) {
                return $repository->createQueryBuilder('m')
                    ->where('m.deletedAt IS null');
            },
            "em" => "tenant",
        ]);
    }

    public function getBlockPrefix()
    {
        return 'members';
    }
}
