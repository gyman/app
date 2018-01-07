<?php
namespace Gyman\Bundle\SettingsBundle\Form\Type;

use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;

class ProfileType extends BaseType
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'gyman_user_profile';
    }
}
