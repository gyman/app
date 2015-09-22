<?php
namespace Gyman\Bundle\FiltersBundle\Form\Type;

use Gyman\Bundle\FiltersBundle\Traits\GetFormType;
use Gyman\Bundle\FiltersBundle\Traits\ParseClassname;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FiltersCollectionType extends AbstractType
{
    use ParseClassname,
        GetFormType;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $filters = $event->getData();

            if (count($filters) == 0) {
                return;
            }

            foreach ($filters as $filter) {
                $formType = $this->getFormType($filter);
                $filterName = $this->parseClassname($filter);

                $event->getForm()->add($filterName, $formType, [
                    'validation_groups' => ['setFilter','saveFilter'],
                    'property_path'     => "[$filterName]",
                ]);

                $event->getForm()->get($filterName)->setData($filter);
            }
        });
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        return 'buildView - please implement when necessary';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class'         => "Doctrine\Common\Collections\ArrayCollection",
            'cascade_validation' => true,
            'error_bubbling'     => true,
        ]);
    }

    public function getParent()
    {
        return 'collection';
    }

    public function getName()
    {
        return 'filters';
    }
}
