<?php
namespace Gyman\Bundle\AppBundle\Form;

use Gyman\Application\Command\UpdateVoucherCommand;
use Gyman\Domain\Member;
use Gyman\Bundle\AppBundle\Form\DataTransformer\VoucherDateTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UpdateVoucherType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add(
            $builder->create('startDate', DateType::class, [
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
            ])->addModelTransformer(new VoucherDateTransformer('start'))
        )
            ->add(
                $builder->create('endDate', DateType::class, [
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                ])->addModelTransformer(new VoucherDateTransformer('end'))
            )
        ->add('price', IntegerType::class, [
            "attr" => [
                "min" => 0
            ]
        ])
        ->add('maximumAmount', IntegerType::class, [
            "attr" => [
                "min" => 0
            ]
        ])
        ->add('update.voucher', SubmitType::class, [
            'attr' => [
                'class' => 'btn btn-large btn-action',
            ],
        ]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => UpdateVoucherCommand::class,
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
        return 'gyman_voucher_update_form';
    }
}
