<?php
namespace Gyman\Application\Handler;

use Gyman\Application\Command\MemberCommandInterface;
use Gyman\Bundle\AppBundle\Services\SubdomainProvider;
use Gyman\Bundle\AppBundle\Services\SubdomainProviderInterface;
use Gyman\Application\Command\CreateMemberCommand;
use Gyman\Application\Command\UpdateMemberCommand;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class UploadMemberFotoHandler
 * @package Gyman\Application\Handler
 */
class UploadMemberFotoHandler
{
    /**
     * @var string
     */
    private $uploadDir;

    /**
     * @var SubdomainProvider
     */
    private $subdomainProvider;

    /**
     * @var string
     */
    private $destinationDir;

    /**
     * @var string
     */
    private $filename;

    /**
     * @var string
     */
    private $filepath;

    /**
     * UploadMemberFotoHandler constructor.
     * @param $uploadDir
     * @param SubdomainProviderInterface $subdomainProvider
     */
    public function __construct($uploadDir, SubdomainProviderInterface $subdomainProvider)
    {
        $this->uploadDir = $uploadDir;
        $this->subdomainProvider = $subdomainProvider;
    }

    /**
     * @param UpdateMemberCommand|CreateMemberCommand $command
     * @throws \Exception
     */
    public function handle(MemberCommandInterface $command)
    {
        $this->destinationDir = $this->createDestinationDir();
        $this->filename = $this->createFilename($command);
        $this->filepath = $this->createFilepath();

        if (!is_null($command->uploadFile)) {
            $this->handleFile($command);
        } else if (!is_null($command->fotoData)) {
            $this->handleDataSrc($command);
        } else {
            return;
        }

        $image = new \Imagick($this->filepath);
        $image->scaleImage(320, 240, true);
        $image->writeImage($this->filepath);

        $command->foto = $this->filename;
    }

    private function handleDataSrc(MemberCommandInterface $command)
    {
        $encodedData = $command->fotoData;
        $encodedData = str_replace(' ','+', $encodedData);
        $encodedData = str_replace('data:image/png;base64,', '', $encodedData);

        $decodedData = base64_decode($encodedData);

        $this->filepath = str_replace(".jpg", ".png", strtolower($this->filepath));
        $this->filename = str_replace(".jpg", ".png", strtolower($this->filename));

        file_put_contents($this->filepath, $decodedData);
    }

    private function handleFile(MemberCommandInterface $command)
    {
        $command->uploadFile->move($this->destinationDir, $this->filename);
    }

    /**
     * @param MemberCommandInterface|UpdateMemberCommand|CreateMemberCommand $command
     * @return string
     */
    private function createFilename($command)
    {
        $extension = $command->uploadFile instanceof UploadedFile ? strtolower($command->uploadFile->getClientOriginalExtension()) : "jpg";

        return sprintf(
            '%d-%s.%s',
            $command->id->toString(),
            md5(microtime(true)),
            $extension
        );
    }

    private function createDestinationDir() : string
    {
        $destinationDir = rtrim($this->uploadDir, "/\\") . DIRECTORY_SEPARATOR . $this->subdomainProvider->getSubdomain()->name();

        if (!file_exists($destinationDir)) {
            mkdir($destinationDir, 0755, true);
        }

        return $destinationDir;
    }

    private function createFilepath() : string
    {
        return $this->destinationDir . DIRECTORY_SEPARATOR . $this->filename;
    }
}
