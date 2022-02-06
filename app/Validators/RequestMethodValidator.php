<?php

namespace Validators;

use Exception;
use Response\Response;

class RequestMethodValidator
{
    /**
     * Validate Request Method
     * 
     * @param $requestType
     * @param $configRequestValue
     * @throws Exception
     */
    public static function validateRequest($requestType, $configRequestValue)
    {
        if (!strtolower($requestType) === $configRequestValue) {
            Response::handleException('Wrong Request method for this endpoint.', 406);
        }
    }
}