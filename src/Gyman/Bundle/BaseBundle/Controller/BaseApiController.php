<?php

namespace Gyman\Bundle\BaseBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use JMS\Serializer\SerializationContext;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class BaseApiController extends FOSRestController
{
    /**
     * @param string $route
     * @param  array  $parameters
     * @return string
     */
    protected function generateAbsoluteUrl($route, $parameters = array())
    {
        return $this->generateUrl($route, $parameters, UrlGeneratorInterface::ABSOLUTE_URL);
    }

    /**
     * @param mixed $data
     * @param int $statusCode
     * @return View
     */
    protected function createView($data, $statusCode)
    {
        $view = View::create();
        $view->setData($data);
        $view->setStatusCode($statusCode);
        $view->setFormat('json');
        $view->setSerializationContext(SerializationContext::create()->setSerializeNull(true));
        return $view;
    }

    /**
     * Returns a NotFoundHttpException.
     *
     * This will result in a 404 response code. Usage example:
     *
     *     throw $this->createNotFoundException('Page not found!');
     *
     * @param string          $message  A message
     * @param \Exception|null $previous The previous exception
     *
     * @return NotFoundHttpException
     */
    public function createNotFoundException($message = 'Not Found', \Exception $previous = null)
    {
        return $this->createView(array(), 404);
    }
}
