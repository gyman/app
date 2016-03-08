<?php
namespace Gyman\Application\Handler;

use Gyman\Bundle\AppBundle\Services\SubdomainProvider;
use Gyman\Bundle\AppBundle\Services\SubdomainProviderInterface;
use Gyman\Application\Command\MemberCommandInterface;
use Gyman\Application\Command\UpdateMemberCommand;
use Gyman\Application\Command\UpdateSettingsCommand;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadClubLogoHandler
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
     * UploadClubLogoHandler constructor.
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
    public function handle(UpdateSettingsCommand $command)
    {
        if ($command->uploadLogo instanceof UploadedFile) {
            $destinationDir = rtrim($this->fotoDestinationDir, "/\\") . DIRECTORY_SEPARATOR . $this->subdomainProvider->getSubdomain();

            if (!file_exists($destinationDir)) {
                mkdir($destinationDir, 0755);
            }

            $filename = sprintf(
                '%s.%s',
                md5(microtime(true)),
                strtolower($command->uploadLogo->getClientOriginalExtension())
            );

            $command->uploadLogo->move($destinationDir . DIRECTORY_SEPARATOR, $filename);
            $command->details->logo = $filename;

            $filepath = $destinationDir . DIRECTORY_SEPARATOR . $filename;

            $image = new \Imagick($filepath);
            $image->scaleImage(200, 60, true);
            $image->writeImage($filepath);
        }
    }
}
