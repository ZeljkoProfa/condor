<?php

namespace Clients;

use FakeData\PositiveGuys;

class PositiveGuysClient implements PositiveGuysInterface
{
    /**
     * Get Data from remote service
     */
    public function getDataFromTheSource()
    {
        return (new PositiveGuys())->getData();
    }
}