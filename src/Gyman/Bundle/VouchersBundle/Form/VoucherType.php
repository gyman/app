<?php
namespace Gyman\Bundle\VouchersBundle\Form;

use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Bundle\VouchersBundle\Form\DataTransformer\VoucherDataTransformer;
use Gyman\Bundle\VouchersBundle\Form\DataTransformer\VoucherDateTransformer;
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
        ->add('member', 'entity', [
            'mapped'       => false,
            'class'        => 'Gyman\Bundle\MembersBundle\Entity\Member',
            'choice_label' => function (Member $member) {
                return sprintf('%s %s', $member->details()->firstname(), $member->details()->lastname());
            },
        ])
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

        $builder->addViewTransformer(new VoucherDataTransformer());
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => 'Gyman\Bundle\VouchersBundle\DTO\VoucherDTO',
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
