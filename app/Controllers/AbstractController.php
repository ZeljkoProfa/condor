<?php

namespace Controllers;

use Domain\StatisticsCalculator;
use Repository\AdditionalAnalyticsDBRepository;
use Repository\DBDBRepository;
use Repository\RemoteServiceDBRepository;
use Request\HttpRequest;

abstract class AbstractController
{
    /**
     * @var HttpRequest
     */
    protected $request;

    /**
     * @var StatisticsCalculator
     */
    protected $statisticsCalculator;

    public function __construct(HttpRequest $request)
    {
        $this->request = $request;
        
        $dbRepository = new DBDBRepository();
        $remoteRepository = new RemoteServiceDBRepository();
        $additionalRepository = new AdditionalAnalyticsDBRepository();
        
        $this->statisticsCalculator = new StatisticsCalculator(
            $dbRepository,
            $remoteRepository,
            $additionalRepository
        );
    }
}