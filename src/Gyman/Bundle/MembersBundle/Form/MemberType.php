<?php

namespace Gyman\Bundle\MembersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Gyman\Bundle\MembersBundle\Form\DataTransformer\DateToStringTransformer;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Bundle\VouchersBundle\Entity\Voucher;

class MemberType extends AbstractType
{
    protected $uploaderHelper;

    public function __construct($uploaderHelper)
    {
        $this->uploaderHelper = $uploaderHelper;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('name')
                ->add(
                    $builder->create(
                        'birthdate', "date", array(
                            "widget" => "single_text",
                        //                            "empty_value" => false,
                            "format" => "dd.MM.yyyy"
                            )
                    )
                        ->addModelTransformer(new DateToStringTransformer())
                )
                ->add('gender', "choice", array(
                    "choices" => array(
                        "male"   => "Mężczyzna",
                        "female" => "Kobieta"
                    )
                ))
                ->add('belt', "choice", array(
                    "choices" => array(
                        "white"  => "biały",
                        "blue"   => "niebieski",
                        "purple" => "purpurowy",
                        "brown"  => "brązowy",
                        "black"  => "czarny"
                    )
                ))
                ->add('phone')
                ->add('email')
                ->add('notes')
                ->add('zipcode')
                ->add('barcode')
                ->add('foto', 'hidden')
                ->add('fotoUploader', "file", array(
                    "mapped" => false,
                    "attr"   => array(
                        "data-url" => $this->uploaderHelper->endpoint('gallery')
                    )
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gyman\Bundle\MembersBundle\Entity\Member'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gyman_members_member_form_type';
    }

    private function getActivitiesFromOptions($options)
    {
        $activities = array();

        if ($options["data"] instanceof Member) {
            /** @var Member */
            $member = $options["data"];

            /** @var Doctrine\ORM\PersistentCollection $vouchers */
            $vouchersCollection = $member->getVouchers();

            if ($vouchersCollection->count() > 0) {
                /** @var Gyman\Bundle\VouchersBundle\Entity\Voucher $lastVoucher */
                $voucher = $vouchersCollection->last();

                if ($voucher instanceof Voucher) {
                    /** @var Doctrine\ORM\PersistentCollection $activitiesCollection */
                    $activitiesCollection = $voucher->getActivities();

                    if ($activitiesCollection->count() > 0) {
                        foreach ($activitiesCollection as $activity) {
                            $activities[$activity->getId()] = $activity->getName();
                        }
                    }
                }
            }
        }

        return $activities;
    }
}
