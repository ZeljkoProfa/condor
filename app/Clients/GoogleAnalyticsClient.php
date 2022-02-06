<?php

namespace Clients;

use FakeData\GoogleAnalyticsData;

class GoogleAnalyticsClient implements GoogleAnalyticsInterface
{
    /**
     * Get Data from something
     */
    public function getDataFromTheSource()
    {
        return (new GoogleAnalyticsData())->getData();
    }
}