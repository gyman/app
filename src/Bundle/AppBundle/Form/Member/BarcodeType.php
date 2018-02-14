<?php

namespace Gyman\Bundle\AppBundle\Form\Member;

use Gyman\Domain\Member\Details\Barcode;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BarcodeType extends AbstractType implements DataMapperInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('barcode', TextType::class, [])
            ->setDataMapper($this)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class" => Barcode::class
        ]);
    }

    public function getBlockPrefix() : string
    {
        return 'barcode';
    }

    /**
     * @param Barcode $data
     * @param \Symfony\Component\Form\FormInterface[]|\Traversable $forms
     */
    public function mapDataToForms($data, $forms)
    {
        $forms = iterator_to_array($forms);
        $forms['barcode']->setData($data->barcode());
    }

    public function mapFormsToData($forms, &$data)
    {
        $forms = iterator_to_array($forms);
        $data = new Barcode($forms['barcode']->getData());
    }
}
