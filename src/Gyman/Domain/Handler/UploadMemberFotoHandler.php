<?php
namespace Gyman\Domain\Handler;

use Gyman\Bundle\AppBundle\Services\SubdomainProvider;
use Gyman\Bundle\AppBundle\Services\SubdomainProviderInterface;
use Gyman\Domain\Command\CreateMemberCommand;
use Gyman\Domain\Command\MemberCommandInterface;
use Gyman\Domain\Command\UpdateMemberCommand;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class UploadMemberFotoHandler
 * @package Gyman\Domain\Handler
 */
final class UploadMemberFotoHandler
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
     * @param MemberCommandInterface|UpdateMemberCommand|CreateMemberCommand $command
     */
    public function handle(MemberCommandInterface $command)
    {
        $this->destinationDir = $this->createDestinationDir();
        $this->filename = $this->createFilename($command);
        $this->filepath = $this->createFilepath();

        if (!is_null($command->fotoData)) {
            $this->handleDataSrc($command);
        } elseif (!is_null($command->uploadFile)) {
            $this->handleFile($command);
        } else {
            return;
        }

        $image = new \Imagick($this->filepath);
        $image->scaleImage(320, 240, true);
        $image->writeImage($this->filepath);

        $command->foto = $this->filename;
    }

    /**
     * @param MemberCommandInterface|UpdateMemberCommand|CreateMemberCommand $command
     */
    private function handleDataSrc(MemberCommandInterface $command)
    {
        $encodedData = $command->fotoData;
        $encodedData = str_replace(' ','+',$encodedData);
        $encodedData = str_replace('data:image/png;base64,', '', $encodedData);

        $decodedData = base64_decode($encodedData);

        file_put_contents($this->filepath, $decodedData);
    }

    /**
     * @param MemberCommandInterface|UpdateMemberCommand|CreateMemberCommand $command
     */
    private function handleFile(MemberCommandInterface $command)
    {
        $command->uploadFile->move($this->destinationDir, $this->filename);
    }

    /**
     * @param MemberCommandInterface|UpdateMemberCommand|CreateMemberCommand $command
     * @return string
     */
    private function createFilename(MemberCommandInterface $command)
    {
        return sprintf(
            '%d-%s.%s',
            $command->id,
            md5(microtime(true)),
            $command->uploadFile instanceof UploadedFile ? strtolower($command->uploadFile->getClientOriginalExtension()) : "jpg"
        );
    }

    /**
     * @return string
     */
    private function createDestinationDir()
    {
        $destinationDir = rtrim($this->uploadDir, "/\\") . DIRECTORY_SEPARATOR . $this->subdomainProvider->getSubdomain();

        if (!file_exists($destinationDir)) {
            mkdir($destinationDir, 0755, true);
        }

        return $destinationDir;
    }

    /**
     * @return string
     */
    private function createFilepath()
    {
        return $this->destinationDir . DIRECTORY_SEPARATOR . $this->filename;
    }
}
