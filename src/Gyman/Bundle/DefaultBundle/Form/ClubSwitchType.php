<?php

namespace Gyman\Bundle\DefaultBundle\Form;

use Gyman\Bundle\UserBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Gyman\Bundle\MembersBundle\Form\DataTransformer\DateToStringTransformer;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Bundle\VouchersBundle\Entity\Voucher;

class ClubSwitchType extends AbstractType
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add(
                    $builder->create('club', "choice", [
                        "choices" => [
                            "aaa1",
                            "aaa2",
                            "aaa3",
                            "aaa4",
                        ]
                    ])
                )
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => '',
            'csrf_protection' => false
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gyman_default_clubswitch';
    }
}
