<?php

namespace Repository;

use Repository\FakeData\RemoteData;

class RemoteServiceDBRepository implements RemoteServiceRepositoryInterface
{
    /**
     * Get Data from remote service
     */
    public function getDataFromTheSource()
    {
        (new RemoteData())->getData();
    }
}