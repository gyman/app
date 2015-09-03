<?php
namespace Gyman\Bundle\MultiDatabaseBundle\Command;

use Gyman\Bundle\MultiDatabaseBundle\Services\DatabaseWorker;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

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
