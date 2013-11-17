<?php

namespace Gyman\Bundle\DefaultBundle\Services;

/**
 * Description of MenuService
 *
 * @author uirapuru
 */
class MenuService implements \ArrayAccess
{
    public $menu = array(
        "test" => array(
            "route" => "abc"
        )
    );

    public function getMenu()
    {
        return $this->menu;
    }

    public function setMenu($menu)
    {
        $this->menu = $menu;

        return $this;
    }

    public function addItem($item)
    {
        $this->menu[] = $item;

        return $this;
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->menu);
    }

    public function offsetGet($offset)
    {
        if ($this->offsetExists($offset)) {
            return $this->menu[$offset];
        }
    }

    public function offsetSet($offset, $value)
    {
        $this->menu[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->menu[$offset]);
    }
}
