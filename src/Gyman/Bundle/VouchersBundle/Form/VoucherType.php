<?php
namespace Gyman\Bundle\VouchersBundle\Form;

use Gyman\Bundle\VouchersBundle\Form\DataTransformer\VoucherDateTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VoucherType extends AbstractType
{
    private $activity_manager;

    public function __construct($activityManager)
    {
        $this->activity_manager = $activityManager;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            $builder
                ->create('startDate', 'date', ['widget' => 'single_text','format' => 'dd.MM.yyyy'])
                ->addModelTransformer(new VoucherDateTransformer('start'))
        )
        ->add(
            $builder
                ->create('endDate', 'date', ['widget' => 'single_text', 'format' => 'dd.MM.yyyy'])
                ->addModelTransformer(new VoucherDateTransformer('end'))
        )
        ->add('price')
        ->add('amount')
        ->add(
            'activities',
            'entity',
            [
                'class'         => 'ScheduleBundle:Activity',
                'property'      => 'name',
                'multiple'      => true,
                'query_builder' => $this->getQueryBuilderClosure(),
            ]
        );
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Gyman\Bundle\VouchersBundle\Entity\Voucher',
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dende_vouchersbundle_voucher';
    }

    /**
     * @return callable
     */
    private function getQueryBuilderClosure()
    {
        $closure = function ($er) {
            return $er->createQueryBuilder('a');
        };

        return $closure;
    }
}
