<?php

namespace Request;

use Exception;

class RequestHandler
{
    const CONTROLLER_NAMESPACE = 'Controllers';
    const NAMESPACE_DELIMITER = '\\';
    const CONTROLLER_SUFFIX = 'Controller';

    /**
     * Method handles request / decides which controller is used.
     * Returns response from controller.
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
            throw new Exception('Resource not found!', 404);
        }
        
        $controller = new $controllerFullyQualifiedName($request);
        
        $controller->$actionName();
    }
    
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