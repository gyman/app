<?php

namespace Gyman\Bundle\FiltersBundle\Form\Extension;

use Symfony\Component\Form\Extension\Core\ChoiceList\SimpleChoiceList;

class ActivitiesChoiceList extends SimpleChoiceList
{
    private $disabledItems = [];

//    function getDisabledItems()
//    {
//        return $this->disabledItems;
//    }
//
//    function setDisabledItems(array $disabledItems)
//    {
//        $this->disabledItems = $disabledItems;
//        return $this;
//    }

    public function addDisabledItem($item)
    {
        $this->disabledItems[] = $item;

        return $this;
    }

    public function isDisabledItem($item)
    {
        return in_array($item, $this->disabledItems);
    }
}
