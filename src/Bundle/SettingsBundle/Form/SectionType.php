<?php
namespace Gyman\Bundle\SettingsBundle\Form;

use Gyman\Application\Command\UpdateSectionCommand;
use Gyman\Bundle\AppBundle\Repository\UserRepository;
use Gyman\Domain\Section;
use Gyman\Domain\Section\SectionId;
use Gyman\Domain\User;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class SectionType
 * @package Gyman\Bundle\AppBundle\Form\CollectionType
 */
final class SectionType extends AbstractType
{
    /** @var SectionId */
    private $sectionId;

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('instructor', EntityType::class, [
                'placeholder' => 'form.choose_instructor',
                'empty_data' => null,
                'required' => false,
                'class' => User::class,
                'query_builder' => function(UserRepository $repository) {
                    return $repository->createQueryBuilder('u')
                        ->where('u.deletedAt IS null')
                        ->andWhere('u.roles LIKE :param')
                        ->setParameter("param", "%ROLE_INSTRUCTOR%")
                        ;
                },
                'label' => 'occurrence.form.instructor.label',
                'choice_label' => function(User $user) : string {
                    return sprintf('%s (%s)', $user->getFullname(), $user->getEmail());
                },
                'choice_value' => 'id',
            ])
            ->add('title', TextType::class, [
                "label" => false,
                "required" => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => Section::class,
            'empty_data' => null,
            'csrf_protection' => true,
            'cascade_validation' => true,
        ]);
    }

    public function getName() : string
    {
        return 'section_type';
    }
}
