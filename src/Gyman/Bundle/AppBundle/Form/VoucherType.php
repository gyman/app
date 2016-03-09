<?php
namespace Gyman\Bundle\AppBundle\Form;

use Gyman\Domain\Member;
use Gyman\Bundle\AppBundle\Form\DataTransformer\MemberToIdTransformer;
use Gyman\Bundle\AppBundle\Form\DataTransformer\VoucherDateTransformer;
use Gyman\Application\Command\CreateVoucherCommand;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VoucherType extends AbstractType
{
    private $memberRepository;

    /**
     * VoucherType constructor.
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
            $builder->create('startDate', 'date', [
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
            ])->addModelTransformer(new VoucherDateTransformer('start'))
        )
            ->add(
                $builder->create('endDate', 'date', [
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                ])->addModelTransformer(new VoucherDateTransformer('end'))
            )
        ->add('price', 'integer', [
            "attr" => [
                "min" => 0
            ]
        ])
        ->add(
            $builder->create('member', 'hidden', [
                "data_class" => null,
                "data" => $options["member"]
            ])->addViewTransformer(new MemberToIdTransformer($this->memberRepository))
        )
        ->add('maximumAmount', 'integer', [
            "attr" => [
                "min" => 0
            ]
        ])
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
            'data_class'      => CreateVoucherCommand::class,
            'csrf_protection' => true,
            'attr'            => [
                'id'         => 'voucherForm',
                'class'      => 'form-horizontal row-fluid',
                'novalidate' => 'NOVALIDATE',
            ],
            'method' => 'POST',
            'memberId' => null,
            'member' => null
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
