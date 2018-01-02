<?php

declare(strict_types=1);

namespace Gyman\Bundle\ReportsBundle\Form\Type;

use Gyman\Bundle\ReportsBundle\Form\DateFilter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class EntryType.
 */
final class DateFilterType extends AbstractType
{
    private $availableStrategies = [];

    /**
     * @param array $availableStrategies
     */
    public function setAvailableStrategies($availableStrategies = [])
    {
        $this->availableStrategies = $availableStrategies;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('strategy', ChoiceType::class, [
                'choices' => array_flip($this->availableStrategies),
                'attr'    => [
                    'class' => 'span4',
                ],
                'label' => 'Rodzaj raportu',
            ])
            ->add('startDate', DateTimeType::class, [
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                'attr'   => [
                    'class' => 'span4',
                ],
                'label' => 'Początek',
            ])
            ->add('endDate', DateTimeType::class, [
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                'attr'   => [
                    'class' => 'span4',
                ],
                'label' => 'Koniec',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'ustaw',
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => DateFilter::class,
            'csrf_protection' => false,
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'reports_date_filter';
    }
}
