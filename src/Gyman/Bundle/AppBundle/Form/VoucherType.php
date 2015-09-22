<?php

namespace Gyman\Bundle\AppBundle\Form;

use Gyman\Bundle\AppBundle\Form\DataTransformer\VoucherDateTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VoucherType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add(
            $builder->create('startDate', 'date', [
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
            ])
                ->addModelTransformer(new VoucherDateTransformer('start')))
        ->add(
            $builder->create('endDate', 'date', [
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
            ])
                ->addModelTransformer(new VoucherDateTransformer('end'))
        )
        ->add('price', 'integer')
        ->add('maximumAmount', 'integer')
            ->add('add.voucher', 'submit', [
                'attr' => [
                    'class' => 'btn btn-large btn-action',
                ],
            ]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => 'Gyman\Domain\Command\CreateVoucherCommand',
            'csrf_protection' => true,
            'attr'            => [
                'id'         => 'voucherForm',
                'class'      => 'form-horizontal row-fluid',
                'novalidate' => 'NOVALIDATE',
            ],
            'method' => 'POST',
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gyman_voucher_form';
    }
}
