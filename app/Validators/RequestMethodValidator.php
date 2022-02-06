<?php

namespace Validators;

use Exception;

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
            throw new Exception('Wrong Request method for this endpoint.', 406);
        }
    }
}