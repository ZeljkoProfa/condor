<?php

namespace Repository;

use Repository\FakeData\AdditionalData;

class AdditionalAnalyticsDBRepository implements AdditionalAnalyticsRepositoryInterface
{
    /**
     * Get Data from something
     */
    public function getDataFromTheSource()
    {
        return (new AdditionalData())->getData();
    }
}