<?php
namespace Gyman\Bundle\MultiDatabaseBundle\Form;

use Gyman\Bundle\UserBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Security\Core\SecurityContext;

class ClubSwitchType extends AbstractType
{
    /**
     * @var User
     */
    private $user;

    public function __construct(SecurityContext $context)
    {
        $this->user = $context->getToken()->getUser();
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $clubs = $this->user->getClubs();

        $builder->add('club', 'entity', [
            'class'    => 'ClubBundle:Club',
            'choices'  => $clubs,
            'property' => 'name',
            'data'     => $this->user->getCurrentClub(),
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gyman_default_clubswitch';
    }
}
