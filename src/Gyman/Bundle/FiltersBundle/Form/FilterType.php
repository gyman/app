<?php
namespace Gyman\Bundle\FiltersBundle\Form;

use Gyman\Bundle\DefaultBundle\Lib\Globals;
use Gyman\Bundle\FiltersBundle\Form\Extension\ActivitiesChoiceList;
use Gyman\Bundle\FiltersBundle\Traits\GetFormType;
use Gyman\Bundle\FiltersBundle\Traits\ParseClassname;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FilterType extends AbstractType
{
    use ParseClassname,
        GetFormType;

    use ParseClassname;

    public function __construct($filtersList)
    {
        $this->filtersList = $filtersList;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $filtersList = $this->getFiltersChoiceList();

        $builder
            ->add('save', 'checkbox', [
                'label'  => 'Zapisz filtr',
                'mapped' => false,
                'data'   => false,
            ])
            ->add('name', 'text', [
                'label' => 'Nazwa filtra',
                'attr'  => [
                    'placeholder' => 'wpisz nazwę...',
                ],
                'validation_groups' => ['saveFilter'],
            ])
            ->add('pinned', 'checkbox', [
                'label' => 'Pokaż na dashboardzie',
            ])
            ->add('listname', 'hidden')
            ->add('addFilter', 'choice', [
                'choice_list'     => $filtersList,
                'label'           => 'Dodaj opcję',
                'empty_value'     => 'wybierz',
                'mapped'          => false,
            ]);

        $builder->addEventListener(FormEvents::PRE_SET_DATA, [$this, 'buildFormCallback']);
    }

    public function buildFormCallback(FormEvent $event)
    {
        $filters = $event->getData()->getFilters();

        if (count($filters) > 0) {
            foreach ($filters as $filterName => $filter) {
                $formType = $this->getFormType($filter);
//                    $filterName = $this->parseClassname($filter);

                $event->getForm()->add('sub_' . $filterName, $formType, [
                    'validation_groups'  => ['setFilter','saveFilter'],
                    'property_path'      => "filters[$filterName]",
                    'cascade_validation' => true,
                    'error_bubbling'     => true,
                ]);

                $event->getForm()->get('sub_' . $filterName)->setData($filter);
            }
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'filter';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired(['mode']);

        $resolver->setDefaults([
            'data_class'         => 'Gyman\Bundle\FiltersBundle\Entity\Filter',
            'validation_groups'  => [$this, 'getValidationGroups'],
            'cascade_validation' => true,
            'error_bubbling'     => true,
        ]);
    }

    public function getValidationGroups(Form $form)
    {
        $mode = $form->getConfig()->getOption('mode');

        $groups = [];

        if ($mode == 'update') {
            $groups[] = 'updateFilter';
        } elseif ($mode == 'save') {
            $groups[] = 'saveFilter';
        } elseif ($mode == 'set') {
            $groups[] = 'setFilter';
        }

        return $groups;
    }

    private function getFiltersArrayForChoiceList()
    {
        $array = [];

        if (count($this->filtersList) > 0) {
            foreach ($this->filtersList as $filter) {
                $name = $this->parseClassname($filter);
                $array[$name] = Globals::getFilterLabel($name);
            }
        }

        return $array;
    }

    /**
     * @return ActivitiesChoiceList
     */
    private function getFiltersChoiceList()
    {
        $choices = $this->getFiltersArrayForChoiceList();
        $choiceList = new ActivitiesChoiceList($choices);

        $filters = $this->getData()->getFilters();

        if (count($filters) > 0) {
            foreach ($filters as $filterName => $filter) {
                $choicesList->addDisabledItem($filterName);
            }
        }

        return $choiceList;
    }

    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        foreach ($view->children['addFilter']->children as $category) {
            if (in_array($category->vars['value'], $ids, true)) {
                $category->vars['attr']['disabled'] = 'disabled';
                $category->vars['checked'] = true;
            }
        }
    }
}
