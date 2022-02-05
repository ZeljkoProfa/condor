<?php

namespace Controllers;

use Domain\StatisticsCalculator;
use Repository\AdditionalAnalyticsDBRepository;
use Repository\DataCollector;
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
    protected $data;

    /**
     * @var DataCollector
     */
    protected $dataCollector;

    /**
     * AbstractController constructor.
     * @param HttpRequest $request
     */
    public function __construct(HttpRequest $request)
    {
        $this->request = $request;
        
        $dbRepository = new DBDBRepository();
        $remoteRepository = new RemoteServiceDBRepository();
        $additionalRepository = new AdditionalAnalyticsDBRepository();
        
        $this->dataCollector = new DataCollector(
            $dbRepository,
            $remoteRepository,
            $additionalRepository
        );
        
        $this->data = $this->dataCollector->combineData();
    }
}