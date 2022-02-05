<?php

namespace Request;

class RequestHandler
{
    /**
     * Method handles request / decides which controller is used.
     * Returns response from controller.
     * 
     * @param $request
     * @return string
     */
    public function handle($request)
    {
        return 'Hello there!';
    }
}