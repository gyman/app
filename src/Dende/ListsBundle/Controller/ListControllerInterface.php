<?php
namespace Dende\ListsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

interface ListControllerInterface {

    public function indexAction(Request $request);

    public function datasourceAction(Request $request);

    public function getListname();

}
