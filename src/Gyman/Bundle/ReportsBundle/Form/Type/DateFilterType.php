<?php
namespace Gyman\Bundle\ReportsBundle\Form\Type;

use Carbon\Carbon;
use DateTime;
use Dende\Calendar\Domain\Calendar;
use Dende\CalendarBundle\Repository\ORM\OccurrenceRepository;
use Dende\Calendar\Domain\Calendar\Event\Occurrence;
use Gyman\Bundle\AppBundle\Entity\Section;
use Gyman\Bundle\AppBundle\Entity\SectionRepository;
use Gyman\Bundle\ReportsBundle\Form\DateFilter;
use Gyman\Domain\Command\OpenEntryCommand;
use Gyman\Domain\Model\Entry;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class EntryType
 * @package Gyman\Bundle\AppBundle\Form
 */
final class DateFilterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startDate', 'datetime', [
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                'attr'   => [
                    'readonly' => 'READONLY',
                    "class" => "span4"
                ],
                'label' => 'Początek',
            ])
            ->add('endDate', 'datetime', [
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                'attr'   => [
                    'readonly' => 'READONLY',
                    "class" => "span4"
                ],
                'label' => 'Koniec',
            ])
            ->add('submit', 'submit', [
                'label' => 'ustaw',
        ]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DateFilter::class
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'reports_date_filter';
    }
}
