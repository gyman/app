<?php

namespace Gyman\Bundle\MembersBundle\Services\Listener;

use Oneup\UploaderBundle\Event\PostPersistEvent;

class ImageRescaleListener
{
    public function __construct($doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function onUpload(PostPersistEvent $event)
    {
        $filename = $event->getFile()->getPathname();
        $image = new \Imagick($filename);
        $image->scaleImage(320, 240, true);
        $image->writeImage($filename);
    }
}
