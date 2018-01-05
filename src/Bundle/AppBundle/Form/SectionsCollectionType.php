<?php
namespace Gyman\Bundle\AppBundle\Form;

use Gyman\Bundle\AppBundle\Repository\SectionRepository;
use Gyman\Domain\Section;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class SectionsCollectionType extends EntityType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'csrf_protection' => true,
            'class' => Section::class,
            'required' => true,
            'multiple' => true,
            'expanded' => true,
            'choice_label' => 'title',
            'choice_value' => 'id',
            'query_builder' => function(SectionRepository $repository) {
                return $repository->createQueryBuilder('s')
                    ->orderBy("s.createdAt", 'ASC')
                    ->where('s.deletedAt IS null');
            },
            "em" => "tenant"
        ]);
    }

    public function getBlockPrefix()
    {
        return 'sections';
    }
}
