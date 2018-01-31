<?php
namespace Gyman\Application\Command;

use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface MemberCommandInterface
{
    /** @var Uuid $id*/
    /** @var UploadedFile $uploadFile */
}