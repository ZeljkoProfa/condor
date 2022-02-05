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
            throw new Exception('Unknown error', 500);
        }
        
        echo json_encode($response);
        die;
    }
}