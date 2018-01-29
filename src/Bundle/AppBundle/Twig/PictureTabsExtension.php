<?php
namespace Gyman\Bundle\AppBundle\Twig;

use Gyman\Bundle\AppBundle\Menu\TabChooserService;

class PictureTabsExtension extends \Twig_Extension
{
    /**
     * @var TabChooserService
     */
    private $tabChooser;

    public function __construct(TabChooserService $tabChooser)
    {
        $this->tabChooser = $tabChooser;
    }

    public function getFunctions() : array
    {
        return [
            new \Twig_SimpleFunction('isCameraPaneActive', [$this, 'isCameraPaneActive']),
        ];
    }

    public function isCameraPaneActive() : bool
    {
        return $this->tabChooser->isCameraPaneActive();
    }

    public function getName() : string
    {
        return 'picture_tabs_extension';
    }
}
