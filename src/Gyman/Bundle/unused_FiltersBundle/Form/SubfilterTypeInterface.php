<?php
namespace Gyman\Bundle\FiltersBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

interface SubfilterTypeInterface
{
    public function getName();

    public function buildForm(FormBuilderInterface $builder, array $options);

    public function setDefaultOptions(OptionsResolverInterface $resolver);
}
