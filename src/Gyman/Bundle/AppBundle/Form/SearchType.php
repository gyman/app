<?php
namespace Gyman\Bundle\AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Gyman\Domain\Member\Details\Belt;
use Gyman\Domain\Section;
use Gyman\Application\Command\SearchMemberCommand;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class MemberType
 * @package Gyman\Bundle\AppBundle
 */
final class SearchType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('query', TextType::class, [
                'label' => 'member_search_form.query',
                'required' => false
            ])
            ->add('section', EntityType::class, [
                'label' => 'member_search_form.section',
                'expanded' => true,
                'multiple' => false,
                'choice_attr' => 'title',
                'choice_name' => 'title',
                'class' => Section::class,
                'empty_data' => 'member_search_form.section.none',
                'required' => false,
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
                    true => 'member_search_form.has_voucher.true',
                    false => 'member_search_form.has_voucher.false',
                ],
            ])
            ->add('hasOpenedEntry', ChoiceType::class, [
                'required' => false,
                'label' => 'member_search_form.has_opened_entry',
                'expanded' => true,
                'multiple' => false,
                'empty_data' => 'member_search_form.has_opened_entry.null',
                'choices' => [
                    true => 'member_search_form.has_opened_entry.true',
                    false => 'member_search_form.has_opened_entry.false',
                ],
            ])
            ->add('starred', ChoiceType::class, [
                'required' => false,
                'label' => 'member_search_form.starred',
                'expanded' => true,
                'multiple' => false,
                'empty_data' => 'member_search_form.starred.null',
                'choices' => [
                    true => 'member_search_form.starred.true',
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'member_search_form.submit',
            ])
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => SearchMemberCommand::class,
            'csrf_protection' => false,
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gyman_member_search_form';
    }
}
