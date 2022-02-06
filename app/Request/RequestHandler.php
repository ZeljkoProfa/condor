<?php

namespace Request;

use Response\Response;
use Exception;

class RequestHandler
{
    const CONTROLLER_NAMESPACE = 'Controllers';
    const NAMESPACE_DELIMITER = '\\';
    const CONTROLLER_SUFFIX = 'Controller';

    /**
     * Method handles request / decides which controller is used and calls it
     * 
     * @throws Exception
     */
    public function handle()
    {
        $request = new HttpRequest();
        $request->createRequest();

        $controllerFullyQualifiedName = $this->getControllerName($request->getControllerName());
        $actionName = $request->getActionName();

        if (!class_exists($controllerFullyQualifiedName)) {
            Response::handleException('Resource not found!', 404);
        }

        if (!method_exists($controllerFullyQualifiedName, $actionName)) {
            Response::handleException('Resource not found!', 404);
        }

        $controller = new $controllerFullyQualifiedName($request);
        
        $controller->$actionName();
    }

    /**
     * Get controllers fully qualified name
     * 
     * @param $controllerName
     * @return string
     */
    private function getControllerName($controllerName)
    {
        return sprintf('%s%s%s%s',
            self::CONTROLLER_NAMESPACE, 
            self::NAMESPACE_DELIMITER,
            ucfirst(strtolower($controllerName)),
            self::CONTROLLER_SUFFIX
        );
    }
}