<?php

namespace Request;

class HttpRequest
{
    const QUERY_STRING_DELIMITER = '?';
    const CONTROLLER_KEY = 0;
    const ACTION_KEY = 1;
    
    /**
     * Controller name
     */
    protected $controllerName = '';

    /**
     * Action name
     */
    protected $actionName = '';

    /**
     * List of all parameters
     */
    protected $parameters = [];

    /**
     * Request Method
     */
    protected $requestMethod = '';

    /**
     * Returns controller name based on request URI
     * 
     * @return string
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * Returns action name based on request URI
     *
     * @return string
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * get value of $_GET or $_POST
     *
     * @return array
     */
    public function getParams()
    {
        return $this->parameters;
    }
    
    public function getRequestMethod()
    {
        return $this->requestMethod;
    }

    /**
     * Set request data to self.
     */
    public function createRequest()
    {
        $uri = $this->getRequestUri();
        $uriParts = explode('/', $uri);

        if (isset($uriParts[self::CONTROLLER_KEY])) {
            $this->controllerName = $uriParts[self::CONTROLLER_KEY];
        }

        if (isset($uriParts[self::ACTION_KEY])) {
            $this->actionName = $uriParts[self::ACTION_KEY];
        }
        
        $this->setRequestMethod();
        $this->setParams();
    }

    /**
     * Set request params
     */
    private function setParams()
    {
        if ($this->requestMethod === 'get') {
            $this->parameters = $_GET;
            
            return;
        }

        if ($this->requestMethod === 'post') {
            $this->parameters = $_POST;
            
            return;
        }

        $this->parameters = $_GET;
    }

    /**
     * Extracts request URI
     * 
     * @return string
     */
    private function getRequestUri()
    {
        if (!isset($_SERVER['REQUEST_URI'])) {
            return '';
        }

        $uri = $_SERVER['REQUEST_URI'];
        
        $uriExploded = explode(self::QUERY_STRING_DELIMITER, $uri);
        $uri = $uriExploded[0];
        
        return trim($uri, '/');
    }

    /**
     * Set request method.
     */
    private function setRequestMethod() 
    {
        $this->requestMethod = strtolower($_SERVER['REQUEST_METHOD']);
    }
}