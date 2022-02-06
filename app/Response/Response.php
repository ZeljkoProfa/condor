<?php

namespace Response;

use Exception;

class Response
{
    /**
     * Response constructor.
     * 
     * @param $response
     * @throws Exception
     */
    public function __construct($response)
    {
        if (!is_array($response)) {
            self::handleException('Unknown error', 500);
        }
        
        echo json_encode($response);
        die;
    }

    /**
     * Throw exception and set http code.
     * 
     * @param $message
     * @param $code
     * @throws Exception
     */
    public static function handleException($message, $code)
    {
        http_response_code($code);
        
        throw new Exception($message);
    }
}