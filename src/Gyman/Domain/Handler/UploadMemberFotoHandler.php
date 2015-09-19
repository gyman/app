<?php
namespace Gyman\Domain\Handler;

use Gyman\Domain\Command\MemberCommandInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadMemberFotoHandler
{
    /**
     * @var
     */
    protected $fotoDestinationDir;

    /**
     * UploadMemberFotoHandler constructor.
     * @param $fotoDestinationDir
     */
    public function __construct($fotoDestinationDir)
    {
        $this->fotoDestinationDir = $fotoDestinationDir;
    }

    /**
     * @param MemberCommandInterface $command
     */
    public function handle(MemberCommandInterface $command){
        if ($command->uploadFile instanceof UploadedFile) {
            $filename = sprintf('%s.%s', md5(microtime(true)), strtolower($command->uploadFile->getClientOriginalExtension()));
            $command->uploadFile->move($this->fotoDestinationDir, $filename);
            $command->foto = $filename;

            $filepath = $this->fotoDestinationDir . '/' . $filename;

            $image = new \Imagick($filepath);
            $image->scaleImage(320, 240, true);
            $image->writeImage($filepath);
        }
    }
}