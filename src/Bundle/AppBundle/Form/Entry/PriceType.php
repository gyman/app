<?php
namespace Gyman\Bundle\AppBundle\Form\Entry;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Gyman\Domain\Calendar\Event\Occurrence\Note;
use Gyman\Domain\Calendar\Event\Occurrence\Subject;
use Gyman\Domain\Entry\Price;
use Gyman\Domain\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Exception;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class PriceType extends AbstractType implements DataMapperInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('price', IntegerType::class, [
            'required' => true,
            'label' => 'occurrence.form.price.label',
        ])
        ->setDataMapper($this);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Price::class
        ]);
    }

    public function getName() : string
    {
        return 'gyman_entry_price_form';
    }

    /**
     * @param Price|null $data
     * @param \Symfony\Component\Form\FormInterface[]|\Traversable $forms
     */
    public function mapDataToForms($data, $forms)
    {
        $forms = iterator_to_array($forms);
        $forms['price']->setData($data ? $data->amount() : null);
    }

    public function mapFormsToData($forms, &$data)
    {
        $forms = iterator_to_array($forms);
        $data = new Price(
            $forms['price']->getData()
        );
    }
}
