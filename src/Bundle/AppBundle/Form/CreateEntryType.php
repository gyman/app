<?php

namespace Gyman\Bundle\AppBundle\Form;

use Gyman\Bundle\AppBundle\Form\Entry\PriceType;
use Gyman\Bundle\AppBundle\Form\Member\BarcodeType;
use Gyman\Bundle\AppBundle\Form\Occurrence\OccurrenceType;
use Gyman\Domain\Entry;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateEntryType extends AbstractType implements DataMapperInterface
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
            ->add("barcode", BarcodeType::class, [
                "required" => true
            ])
            ->add('occurrence', OccurrenceType::class, [
                "required" => true
            ])
            ->add('price', PriceType::class, [
                "required" => false
            ])
            ->add('entryType', ChoiceType::class, [
                "required" => true,
                'choices'  => array_flip($choices),
                'data'     => null,
                'expanded' => true,
                'label'    => 'entries.form.entry_type.label',
            ])
            ->add('add_another', CheckboxType::class, [
                "mapped" => false
            ])
            ->add('submit', SubmitType::class, [])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class" => Entry\Command\QuickOpenEntry::class
        ]);
    }

    public function getBlockPrefix()
    {
        return 'entry_type';
    }

    /**
     * @param Entry\Command\QuickOpenEntry $data
     * @param \Symfony\Component\Form\FormInterface[]|\Traversable $forms
     */
    public function mapDataToForms($data, $forms)
    {
        $forms = iterator_to_array($forms);

        $forms["barcode"]->setData($data->barcode());
        $forms["entryType"]->setData($data->entryType());
        $forms["price"]->setData($data->price());
        $forms["occurrence"]->setData($data->occurrence());
    }

    public function mapFormsToData($forms, &$data)
    {
        $forms = iterator_to_array($forms);
        $data = new Entry\Command\QuickOpenEntry(
            $forms["barcode"]->getData(),
            $forms["entryType"]->getData(),
            $forms["price"]->getData(),
            $forms["occurrence"]->getData()
        );
    }
}
