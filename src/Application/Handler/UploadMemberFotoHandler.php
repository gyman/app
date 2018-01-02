<?php

declare(strict_types=1);

namespace Gyman\Application\Handler;

use Gyman\Application\Command\CreateMemberCommand;
use Gyman\Application\Command\UpdateMemberCommand;
use Gyman\Bundle\AppBundle\Services\SubdomainProvider;
use Gyman\Bundle\AppBundle\Services\SubdomainProviderInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class UploadMemberFotoHandler.
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
     *
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
     *
     * @throws \Exception
     */
    public function handle($command)
    {
        if (!$command instanceof UpdateMemberCommand && !$command instanceof CreateMemberCommand) {
            throw new \Exception(sprintf('Upload Foto Command can be only %s or %s type'), UpdateMemberCommand::class, CreateMemberCommand::class);
        }

        $this->destinationDir = $this->createDestinationDir();
        $this->filename = $this->createFilename($command);
        $this->filepath = $this->createFilepath();

        if (null !== $command->fotoData) {
            $this->handleDataSrc($command);
        } elseif (null !== $command->uploadFile) {
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
    private function handleDataSrc($command)
    {
        $encodedData = $command->fotoData;
        $encodedData = str_replace(' ', '+', $encodedData);
        $encodedData = str_replace('data:image/png;base64,', '', $encodedData);

        $decodedData = base64_decode($encodedData, true);

        file_put_contents($this->filepath, $decodedData);
    }

    /**
     * @param MemberCommandInterface|UpdateMemberCommand|CreateMemberCommand $command
     */
    private function handleFile($command)
    {
        $command->uploadFile->move($this->destinationDir, $this->filename);
    }

    /**
     * @param MemberCommandInterface|UpdateMemberCommand|CreateMemberCommand $command
     *
     * @return string
     */
    private function createFilename($command)
    {
        return sprintf(
            '%d-%s.%s',
            $command->id,
            md5(microtime(true)),
            $command->uploadFile instanceof UploadedFile ? strtolower($command->uploadFile->getClientOriginalExtension()) : 'jpg'
        );
    }

    /**
     * @return string
     */
    private function createDestinationDir()
    {
        $destinationDir = rtrim($this->uploadDir, '/\\') . DIRECTORY_SEPARATOR . $this->subdomainProvider->getSubdomain();

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
