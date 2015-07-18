<?php
namespace Gyman\Bundle\MultiDatabaseBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Gyman\Bundle\MultiDatabaseBundle\Services\DatabaseWorker;

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
