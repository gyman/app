<?php
namespace Gyman\Bundle\MembersBundle\Controller;

use Oneup\UploaderBundle\Controller\AbstractController;
use Oneup\UploaderBundle\Uploader\Response\EmptyResponse;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadController extends AbstractController
{
    public function upload()
    {
        $request = $this->container->get('request');
        $response = new EmptyResponse();
        $files = $this->getFiles($request->files);

        $webcamFile = $this->handleWebcamFile();

        if ($webcamFile) {
            $files[] = $webcamFile;
        }

        foreach ((array) $files as $file) {
            try {
                $this->handleUpload($file, $response, $request);
            } catch (UploadException $e) {
                $this->errorHandler->addException($response, $e);
            }
        }

        return $this->createSupportedJsonResponse($response->assemble());
    }

    private function handleWebcamFile()
    {
        $request = $this->container->get('request');
        $webcamFileBase64 = $request->get('UploadedFile', false);

        if ($webcamFileBase64) {
            $webcamFileBase64 = str_replace('data:image/png;base64,', '', $webcamFileBase64);
            $webcamFileBase64 = str_replace(' ', '+', $webcamFileBase64);
            $webcamFile = base64_decode($webcamFileBase64, 22);

            $file = uniqid() . '.png';
            $tmp_dir = ini_get('upload_tmp_dir') ? ini_get('upload_tmp_dir') : sys_get_temp_dir();
            $filepath = rtrim($tmp_dir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $file;

            file_put_contents($filepath, $webcamFile);

            return new UploadedFile($filepath, $file, 'image/png', strlen($webcamFile), 0);
        }

        return;
    }
}
