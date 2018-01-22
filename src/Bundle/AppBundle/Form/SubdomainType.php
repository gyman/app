<?php

namespace Gyman\Bundle\AppBundle\Form;

use Gyman\Bundle\ClubBundle\Entity\Subdomain;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubdomainType extends AbstractType implements DataMapperInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class);

        $builder->setDataMapper($this);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class" => Subdomain::class,
            "empty_data" => null
        ]);
    }

    public function getBlockPrefix()
    {
        return 'subdomain';
    }

    /**
     * @param Subdomain $data
     * @param FormInterface[]|\Traversable $forms
     */
    public function mapDataToForms($data, $forms)
    {
        if(null === $data) {
            return;
        }

        $forms = iterator_to_array($forms);
        $forms['name']->setData($data->name());
    }

    /**
     * @param FormInterface[]|\Traversable $forms
     * @param Subdomain $data
     */
    public function mapFormsToData($forms, &$data)
    {
        $forms = iterator_to_array($forms);
        $data = new Subdomain(
            $forms['name']->getData()
        );
    }
}
