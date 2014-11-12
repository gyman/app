<?php
namespace Gyman\Bundle\DefaultBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Gyman\Bundle\DefaultBundle\Services\DatabaseWorker;

abstract class AbstractCommand extends ContainerAwareCommand
{
    /**
     * @var ContainerInterface|null
     */
    protected $container;

    /**
     * @var DatabaseWorker
     */
    protected $dataBaseWorker;

    /**
     * @param DatabaseWorker $dataBaseWorker
     */
    public function setDataBaseWorker($dataBaseWorker)
    {
        $this->dataBaseWorker = $dataBaseWorker;
    }
}