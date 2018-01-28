<?php
namespace Gyman\Bundle\AppBundle\Menu;

use Gyman\Domain\Member;
use Symfony\Component\HttpFoundation\RequestStack;

class TabChooserService
{
    /** @var RequestStack */
    private $requestStack;

    /** @var Member */
    private $member;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function setMember(Member $member): void
    {
        $this->member = $member;
    }

    public function isCameraPaneActive() : bool
    {
        /** Member is set - show file pane */
        if($this->member !== null) {
            return false;
        }

        /** Uploaded file - show file pane */
        $request = $this->requestStack->getMasterRequest();

        $fileUploaded = $request->files->get("member");

        if($fileUploaded !== null && !empty($fileUploaded["uploadFile"]))
        {
            return false;
        }

        /** picture data sent in request - show file pane */
        $requestData = $request->get("member", []);
        if(array_key_exists('fotoData', $requestData) && !empty($requestData["fotoData"]))
        {
            return false;
        }

        return true;
    }
}