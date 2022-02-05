<?php

namespace Response;

class Response
{
    public function __construct($response)
    {
        echo json_encode($response);
        die;
    }
}