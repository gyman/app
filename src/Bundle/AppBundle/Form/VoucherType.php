<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Form;

use Gyman\Application\Command\CreateVoucherCommand;
use Gyman\Bundle\AppBundle\Form\DataTransformer\MemberToIdTransformer;
use Gyman\Bundle\AppBundle\Form\DataTransformer\VoucherDateTransformer;
use Gyman\Domain\Member;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoucherType extends AbstractType
{
    private $memberRepository;

    /**
     * VoucherType constructor.
     *
     * @param $memberRepository
     */
    public function __construct($memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

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
            'attr' => [
                'min' => 0,
            ],
        ])
        ->add(
            $builder->create('member', HiddenType::class, [
                'data_class' => null,
                'data'       => $options['member'],
            ])->addViewTransformer(new MemberToIdTransformer($this->memberRepository))
        )
        ->add('maximumAmount', IntegerType::class, [
            'attr' => [
                'min' => 0,
            ],
        ])
        ->add('add.voucher', SubmitType::class, [
            'attr' => [
                'class' => 'btn btn-large btn-action',
            ],
        ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => CreateVoucherCommand::class,
            'csrf_protection' => true,
            'attr'            => [
                'id'         => 'voucherForm',
                'class'      => 'form-horizontal row-fluid',
                'novalidate' => 'NOVALIDATE',
            ],
            'method'   => 'POST',
            'memberId' => null,
            'member'   => null,
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
