<?php
namespace Gyman\Domain\Handler;

use Gyman\Bundle\AppBundle\Services\SubdomainProvider;
use Gyman\Bundle\AppBundle\Services\SubdomainProviderInterface;
use Gyman\Domain\Command\MemberCommandInterface;
use Gyman\Domain\Command\UpdateMemberCommand;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadMemberFotoHandler
{
    /**
     * @var string
     */
    protected $fotoDestinationDir;

    /**
     * @var SubdomainProvider
     */
    protected $subdomainProvider;

    /**
     * UploadMemberFotoHandler constructor.
     * @param $fotoDestinationDir
     * @param SubdomainProviderInterface $subdomainProvider
     */
    public function __construct($fotoDestinationDir, SubdomainProviderInterface $subdomainProvider)
    {
        $this->fotoDestinationDir = $fotoDestinationDir;
        $this->subdomainProvider = $subdomainProvider;
    }

    /**
     * @param UpdateMemberCommand $command
     */
    public function handle(MemberCommandInterface $command)
    {
        if ($command->uploadFile instanceof UploadedFile) {
            $destinationDir = $this->fotoDestinationDir . DIRECTORY_SEPARATOR . $this->subdomainProvider->getSubdomain();

            if (!file_exists($destinationDir)) {
                mkdir($destinationDir, 0755);
            }

            $filename = sprintf(
                '%d-%s.%s',
                $command->id,
                md5(microtime(true)),
                strtolower($command->uploadFile->getClientOriginalExtension())
            );

            $command->uploadFile->move($destinationDir . DIRECTORY_SEPARATOR, $filename);
            $command->foto = $filename;

            $filepath = $destinationDir . DIRECTORY_SEPARATOR . $filename;

            $image = new \Imagick($filepath);
            $image->scaleImage(320, 240, true);
            $image->writeImage($filepath);
        }
    }
}
