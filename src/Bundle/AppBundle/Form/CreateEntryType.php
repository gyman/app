<?php

namespace Gyman\Bundle\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateEntryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choices = [
            Entry::TYPE_CREDIT  => 'entries.form.entry_type.credit.label',
            Entry::TYPE_VOUCHER => 'entries.form.entry_type.voucher.label',
            Entry::TYPE_FREE    => 'entries.form.entry_type.free.label',
            Entry::TYPE_PAID    => 'entries.form.entry_type.paid.label',
        ];

        $builder
            ->add("member", MemberType::class, [])
            ->add('occurrence', OccurrenceType::class, [])
            ->add('price', PriceType::class, [])
            ->add('entryType', ChoiceType::class, [
                'choices'  => array_flip($choices),
                'data'     => null,
                'expanded' => true,
                'label'    => 'entries.form.entry_type.label',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'gyman_app_bundle_create_entry_type';
    }
}
