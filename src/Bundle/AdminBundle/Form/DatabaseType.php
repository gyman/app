<?php

namespace Gyman\Bundle\AdminBundle\Form;

use Gyman\Bundle\ClubBundle\Entity\Database;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DatabaseType extends AbstractType implements DataMapperInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dbname', TextType::class)
            ->add('username', TextType::class)
            ->add('password', RepeatedType::class, [
                'type'            => PasswordType::class,
                'error_bubbling'  => true,
                'required'        => false,
                'options'         => [],
                'first_options'   => ['label' => 'form.password'],
                'second_options'  => ['label' => 'form.password_confirmation'],
                'invalid_message' => 'password.mismatch',
            ])
            ->add('host', ChoiceType::class, [
                "choices" => [
                    'localhost' => 'localhost'
                ]
            ])
        ;

        $builder->setDataMapper($this);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Database::class,
            'empty_data' => new Database()
        ]);
    }

    public function getBlockPrefix()
    {
        return 'database';
    }

    /**
     * @param Database $data
     * @param FormInterface[]|\Traversable $forms
     */
    public function mapDataToForms($data, $forms)
    {
        if(null === $data) {
            return;
        }

        $forms = iterator_to_array($forms);
        $forms['dbname']->setData($data->dbname());
        $forms['host']->setData($data->host());
        $forms['password']->setData($data->password());
        $forms['username']->setData($data->username());
    }

    public function mapFormsToData($forms, &$data)
    {
        $forms = iterator_to_array($forms);
        $data = new Database(
            $forms['dbname']->getData(),
            $forms['username']->getData(),
            $forms['password']->getData(),
            $forms['host']->getData()
        );
    }
}
