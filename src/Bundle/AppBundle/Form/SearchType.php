<?php
namespace Gyman\Bundle\AppBundle\Form;

use Gyman\Bundle\AppBundle\Repository\SectionRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Gyman\Domain\Member\Details\Belt;
use Gyman\Domain\Section;
use Gyman\Application\Command\SearchMemberCommand;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('query', TextType::class, [
                'label' => 'member_search_form.query',
                'required' => false
            ])
            // @todo replace with plain array
            ->add('section', EntityType::class, [
                'label' => 'member_search_form.section',
                'expanded' => true,
                'multiple' => false,
                'choice_label' => 'title',
                'choice_value' => 'id',
                'class' => Section::class,
                'empty_data' => 'member_search_form.section.none',
                'required' => false,
                'query_builder' => function(SectionRepository $repository) {
                    return $repository->createQueryBuilder('s')
                        ->orderBy("s.createdAt", 'ASC')
                        ->where('s.deletedAt IS null');
                }
            ])
            ->add('belt', ChoiceType::class, [
                'label' => 'member_search_form.belt',
                'expanded' => true,
                'multiple' => false,
                'choices' => array_combine(Belt::$colors, Belt::$colors),
                'empty_data' => 'member_search_form.belt.none',
                'required' => false,
            ])
            ->add('hasVoucher', ChoiceType::class, [
                'required' => false,
                'label' => 'member_search_form.has_voucher',
                'expanded' => true,
                'multiple' => false,
                'empty_data' => 'member_search_form.has_voucher.null',
                'choices' => [
                    'member_search_form.has_voucher.true' => true,
                    'member_search_form.has_voucher.false' => false,
                ],
            ])
            ->add('hasOpenedEntry', ChoiceType::class, [
                'required' => false,
                'label' => 'member_search_form.has_opened_entry',
                'expanded' => true,
                'multiple' => false,
                'empty_data' => 'member_search_form.has_opened_entry.null',
                'choices' => [
                    'member_search_form.has_opened_entry.true' => true,
                    'member_search_form.has_opened_entry.false' => false,
                ],
            ])
            ->add('starred', ChoiceType::class, [
                'required' => false,
                'label' => 'member_search_form.starred',
                'expanded' => true,
                'multiple' => false,
                'empty_data' => 'member_search_form.starred.null',
                'choices' => [
                    'member_search_form.starred.true' => true,
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => SearchMemberCommand::class,
            'csrf_protection' => false,
        ]);
    }

    public function getName()
    {
        return 'gyman_member_search_form';
    }
}
