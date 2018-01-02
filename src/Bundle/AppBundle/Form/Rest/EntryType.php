<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Form\Rest;

use Gyman\Application\Command\OpenEntryCommand;
use Gyman\Domain\Calendar\Event\Occurrence;
use Gyman\Domain\Entry;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class EntryType.
 */
final class EntryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('occurrence', EntityType::class, [
            'required' => true,
            'class'    => 'Gyman\Domain\Calendar\Event\Occurrence',
        ])
        ->add('price', IntegerType::class, [
            'attr' => [
                'min'  => 0,
                'step' => 5,
            ],
        ]);

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            /** @var OpenEntryCommand $data */
            $data = $event->getData();
            $form = $event->getForm();

            $choices = [
                Entry::TYPE_CREDIT  => 'entries.form.entry_type.credit.label',
                Entry::TYPE_VOUCHER => 'entries.form.entry_type.voucher.label',
                Entry::TYPE_FREE    => 'entries.form.entry_type.free.label',
                Entry::TYPE_PAID    => 'entries.form.entry_type.paid.label',
            ];

            if (!$data->member->hasCurrentVoucher() || !$data->member->currentVoucher()->isCurrent()) {
                unset($choices[Entry::TYPE_VOUCHER]);
            } else {
                unset($choices[Entry::TYPE_CREDIT]);
            }

            $form->add('entryType', ChoiceType::class, [
                'choices'  => $choices,
            ]);
        });

        $builder->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
            /** @var OpenEntryCommand $data */
            $data = $event->getData();
            if (Entry::TYPE_PAID !== $data->entryType) {
                $data->price = null;
            }
        });
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OpenEntryCommand::class,
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gyman_entry_form_rest';
    }

    /**
     * Returns the prefix of the template block name for this type.
     *
     * The block prefixes default to the underscored short class name with
     * the "Type" suffix removed (e.g. "UserProfileType" => "user_profile").
     *
     * @return string The prefix of the template block name
     */
    public function getBlockPrefix()
    {
        return null;
    }
}
