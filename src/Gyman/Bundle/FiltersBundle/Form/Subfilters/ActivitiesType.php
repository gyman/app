<?php

namespace Gyman\Bundle\FiltersBundle\Form\Subfilters;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Gyman\Bundle\FiltersBundle\Form\AbstractSubfilterType;
use Symfony\Component\Validator\Constraints\Callback;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Context\LegacyExecutionContext as ExecutionContext;

class ActivitiesType extends AbstractSubfilterType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('activity', "entity", [
                'class'         => 'ScheduleBundle:Activity',
                'property'      => 'name',
                'multiple'      => true,
                "property_path" => "[activities]",
//                'query_builder' => function ($er) {
//                return $er->createQueryBuilder('a');
//            },
                "constraints" => $this->getActivityFieldConstraints(),
        ]);
    }

    public function getName()
    {
        return "activities";
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => "Gyman\Bundle\FiltersBundle\Filters\Activities",
        ));
    }

    private function getActivityFieldConstraints()
    {
        return [
            new Callback(function (ArrayCollection $collection, ExecutionContext $context) {
//                if (count($collection) == 0)
//                {
                    $context->addViolationAt(
                        'activity',
                        'Musisz podać jakieś aktywności!',
                        [],
                        null
                    );
//                }
            }),
            ];
    }
}
