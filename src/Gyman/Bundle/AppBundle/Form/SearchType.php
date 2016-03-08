<?php
namespace Gyman\Bundle\AppBundle\Form;

use Gyman\Domain\Member\Details\Belt;
use Gyman\Domain\Section;
use Gyman\Application\Command\SearchMemberCommand;
use Symfony\Component\Form\AbstractType;
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
            ->add('query', 'text', [
                'label' => 'member_search_form.query',
                'required' => false
            ])
            ->add('section', 'entity', [
                'label' => 'member_search_form.section',
                'expanded' => true,
                'multiple' => false,
                'class' => Section::class,
                'property' => 'title',
                'empty_value' => 'member_search_form.section.none',
                'required' => false,
            ])
            ->add('belt', 'choice', [
                'label' => 'member_search_form.belt',
                'expanded' => true,
                'multiple' => false,
                'choices' => array_combine(Belt::$colors, Belt::$colors),
                'empty_value' => 'member_search_form.belt.none',
                'required' => false,
            ])
            ->add('hasVoucher', 'choice', [
                'required' => false,
                'label' => 'member_search_form.has_voucher',
                'expanded' => true,
                'multiple' => false,
                'empty_value' => 'member_search_form.has_voucher.null',
                'choices' => [
                    true => 'member_search_form.has_voucher.true',
                    false => 'member_search_form.has_voucher.false',
                ]
            ])
            ->add('hasOpenedEntry', 'choice', [
                'required' => false,
                'label' => 'member_search_form.has_opened_entry',
                'expanded' => true,
                'multiple' => false,
                'empty_value' => 'member_search_form.has_opened_entry.null',
                'choices' => [
                    true => 'member_search_form.has_opened_entry.true',
                    false => 'member_search_form.has_opened_entry.false',
                ],
            ])
            ->add('starred', 'choice', [
                'required' => false,
                'label' => 'member_search_form.starred',
                'expanded' => true,
                'multiple' => false,
                'empty_value' => 'member_search_form.starred.null',
                'choices' => [
                    true => 'member_search_form.starred.true',
                ],
            ])
            ->add('submit', 'submit', [
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
